/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.mycompany.converter;

import com.jfoenix.controls.JFXComboBox;
import com.jfoenix.controls.JFXTextField;
import java.net.URL;
import java.util.ResourceBundle;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.text.Text;
import javax.swing.JOptionPane;

/**
 *
 * @author f0r
 */
public class Currency_controller implements Initializable{
         @FXML
    private JFXComboBox cu_from_combobox;
    DBconnect db=new DBconnect();
    String name,name2,Clist,fromrate,torate,torate2;
    float fromratef,toratef,toratef2;
    @FXML
    private JFXComboBox cu_to_combobox;
    @FXML
    private JFXTextField AmountText;

    @FXML
    private Text resulttext;

    @FXML
    void convert(ActionEvent event) {
     convertcu();
    }
    public void initialize(URL location, ResourceBundle resources) {
        DBconnect db=new DBconnect();
        getdata();
        getrate();
        
        
    }
    
    
    public void getdata(){
    //this is a method used for getting the list of currenycies from the database
    try{
     String Q = ("select currency_type from currency");
     db.rs = db.st.executeQuery(Q);  
     
     while(db.rs.next()){
         
         Clist=db.rs.getString(1);
         
         cu_from_combobox.getItems().addAll(Clist);
         cu_to_combobox.getItems().addAll(Clist);
         
     }
    }catch(Exception ex){
        JOptionPane.showMessageDialog(null, ex);
    } 
    
}
    public void getrate(){
        //this method used to get the rate of all the currencies in the database
        try{
            name=cu_from_combobox.getSelectionModel().getSelectedItem().toString();
            name2=cu_to_combobox.getSelectionModel().getSelectedItem().toString();
            String QF = ("select from_currency from exchange_rate where e_id='"+name+"'");
            String QT = ("select to_currency from exchange_rate where e_id='"+name+"'");
            String QT2 = ("select to_currency from exchange_rate where e_id='"+name2+"'");
            db.rs2 = db.st2.executeQuery(QF);
            db.rs3 = db.st3.executeQuery(QT);
            db.rs4 = db.st4.executeQuery(QT2);
            while(db.rs2.next()){
                fromrate = db.rs2.getString("from_currency");
                //fromrate.setText(db.rs2.getString("from_currency"));
                
            }while(db.rs3.next()){
                //torate.setText(db.rs3.getString("to_currency"));
                torate = db.rs3.getString("to_currency");
                
            }while (db.rs4.next()){
                torate2 = db.rs4.getString("to_currency");
            }
            
        }catch(Exception ex){
            //JOptionPane.showMessageDialog(null, ex);
        }
    }
    public void convertcu(){
       //this is a method used to convert the currencies into other currencies
        try{
         getrate();
         fromratef = Float.parseFloat(fromrate);  
         toratef = Float.parseFloat(torate);
         toratef2 = Float.parseFloat(torate2);
         String check1;
        check1 = cu_from_combobox.getSelectionModel().getSelectedItem().toString();
        String check2;
        check2 = cu_to_combobox.getSelectionModel().getSelectedItem().toString();
        float amount;
        amount = Float.parseFloat(AmountText.getText());
        float usd;
        float tocu;
        if(!check1.equals("USD") && !check2.equals("USD")){
            //converting the first selected currency to USD
            usd = (amount/fromratef);
            //converting to the secand selected currency
            tocu = (usd/toratef2);
            resulttext.setText(tocu+" "+check2);
            System.out.println(check2);
        }else if(check1.equals("USD") && !check2.equals("USD")){
            tocu = (amount/toratef2);
            resulttext.setText(tocu+" "+check2);
        }else if(!check1.equals("USD") && check2.equals("USD")){
            usd = (amount/fromratef);
            resulttext.setText(usd+" "+check2);
            System.out.println(fromratef);
        }
       }catch(Exception ex){
           JOptionPane.showMessageDialog(null, ex);
       }
        
        
    }
}
