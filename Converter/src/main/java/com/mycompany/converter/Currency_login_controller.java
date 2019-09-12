/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.mycompany.converter;

import com.jfoenix.controls.JFXButton;
import com.jfoenix.controls.JFXComboBox;
import com.jfoenix.controls.JFXPasswordField;
import com.jfoenix.controls.JFXTextField;
import de.jensd.fx.glyphs.fontawesome.FontAwesomeIconView;
import java.io.IOException;
import java.net.URL;
import java.util.ResourceBundle;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Node;
import javafx.scene.Parent;
import javafx.scene.input.MouseEvent;
import javafx.scene.layout.AnchorPane;
import javafx.scene.layout.BorderPane;
import javafx.scene.text.Text;
import javafx.stage.Stage;
import javax.swing.JOptionPane;

/**
 *
 * @author f0r
 */
public class Currency_login_controller implements Initializable{
    @FXML
    private AnchorPane par;  
    @FXML
    private Text resulttext,fromrate,torate,status;
    DBconnect db=new DBconnect();    
      @FXML
    private JFXTextField Usernametext;
      @FXML
    private FontAwesomeIconView controlpanalicon,Controlpanalsigniconb;
      @FXML
    private Text Controlpanalsigntext,Controlpanalsigntextb;
    @FXML
    private JFXButton Loginbtn;
    @FXML
    private JFXComboBox namelist;
    String dlist;
    @FXML
    private AnchorPane controlpanal;
    @FXML
    private JFXPasswordField Passwordtext;

    @FXML
    private JFXButton add;

    @FXML
    private JFXTextField namebox;

    @FXML
    private JFXTextField fromratebox;

    @FXML
    private JFXTextField toratebox;

    @FXML
    private JFXButton delete;

    @FXML
    private JFXButton getdata;

    @FXML
    private JFXButton update;

    @FXML
    private JFXButton clearbox;

    @FXML
    void controlmenu(ActionEvent event) {
     if(event.getSource()==add){
          
        try{
             String QN = ("insert into currency values ('"+namebox.getText().toString()+"','"+namebox.getText().toString()+"')");
             db.st.execute(QN);
             String QRF = ("insert into exchange_rate values ('"+Float.parseFloat(fromratebox.getText())+"','"+Float.parseFloat(toratebox.getText())+"','"+namebox.getText().toString()+"')");
             db.st2.execute(QRF);
             namelist.getItems().clear();
             getdata();
             status.setText("inserted data");
        }catch(Exception ex){
            JOptionPane.showMessageDialog(null, ex);
        }
     }else if(event.getSource()==delete){
         try{
             
             String dname;
             
        dname = namelist.getSelectionModel().getSelectedItem().toString();
        
        String Q1= ("delete from currency where currency_id='"+dname+"'");
        String Q2= ("delete from exchange_rate where e_id='"+dname+"'");
        db.st.execute(Q1);
        db.st2.execute(Q2);
        getdata();
        fromrate.setText("null");
        torate.setText("null");
        status.setText("Deleted!");
        }catch(Exception ex){
            JOptionPane.showMessageDialog(null, ex);
        }
         
     }else if(event.getSource()==update){
         try{
         
        
        String orgname= namelist.getSelectionModel().getSelectedItem().toString();
        String QN = ("update currency set currency_id='"+namebox.getText().toString()+"',currency_type='"+namebox.getText().toString()+"' where currency_id='"+orgname+"'");
        String QR = ("update exchange_rate set e_id='"+namebox.getText().toString()+"',from_currency='"+Float.parseFloat(fromratebox.getText())+"',to_currency='"+Float.parseFloat(toratebox.getText())+"' where e_id='"+orgname+"'");
        db.st.execute(QN);
        db.st.execute(QR);
        getdata();
        status.setText("updated!");
        }catch(Exception ex){
        JOptionPane.showMessageDialog(null, ex);
        }
         
     }else if(event.getSource()==getdata){
         getdata();
          
     }else if(event.getSource()==clearbox){
         namelist.getItems().clear();
     }
    }
 
    @FXML
      String username,password;
      boolean good;
      String query;
    @FXML
    void login(ActionEvent event) throws IOException {
     logins();  
     checklogin();
    }
    @Override
    public void initialize(URL location, ResourceBundle resources) {
         DBconnect db=new DBconnect();
         namelist.getItems().clear();
          try{
              String QN = ("select e_id from exchange_rate");
               db.rs = db.st.executeQuery(QN);  
               while(db.rs.next()){         
                                   dlist=db.rs.getString(1);
                                   namelist.getItems().addAll(dlist);        
                                   }
     
     
        }catch(Exception ex){
        JOptionPane.showMessageDialog(null, ex);
        } 
         
    }
    public void logins(){
         //we use this method to get the info from the database
    try {
             DBconnect db=new DBconnect();
             query = ("select username,password from users where username='"+Usernametext.getText().toString()+"'and password='"+Passwordtext.getText().toString()+"'");    
             db.rs = db.st.executeQuery(query);
             while(db.rs.next()){
                 
                     username=db.rs.getString("username");
                     password=db.rs.getString("password"); 
                     good=true;
                 
             }
             
             
             
         } catch (Exception ex) {
             JOptionPane.showMessageDialog(null, ex);
         }
    
    
}
public void checklogin(){
    //we use this method to check login info    
    
    
    try{
        
        if(username.equals(Usernametext.getText().toString()) && password.equals(Passwordtext.getText().toString()) && good==true){
                
                   db.adminlogin=1;
                   par.getChildren().removeAll(Usernametext,Passwordtext,Loginbtn,resulttext,Controlpanalsigntext,controlpanalicon);
                   controlpanal.setEffect(null);
                   controlpanal.setDisable(false);
            }else
                resulttext.setText("Username or password is wrong");
                
                
        
        
    }catch(Exception ex){
        

    resulttext.setText("Username or password is wrong");
    }
    
    
    
}   

public void getdata(){
    namelist.getItems().clear();
          try{
              String QN = ("select e_id from exchange_rate");
               db.rs = db.st.executeQuery(QN);  
               while(db.rs.next()){         
                                   dlist=db.rs.getString(1);
                                   namelist.getItems().addAll(dlist);        
                                   }
     
     
        }catch(Exception ex){
        JOptionPane.showMessageDialog(null, ex);
        } 
}
public void getrate(){
        //this method will get all the currnceis rate from the database
        try{
           String jlist;
            String name=namelist.getSelectionModel().getSelectedItem().toString();
            String QF = ("select from_currency from exchange_rate where e_id='"+name+"'");
            String QT = ("select to_currency from exchange_rate where e_id='"+name+"'");
            db.rs2 = db.st2.executeQuery(QF);
            db.rs3 = db.st3.executeQuery(QT);
            
            while(db.rs2.next()){
                fromrate.setText(db.rs2.getString("from_currency"));
                
            }while(db.rs3.next()){
                torate.setText(db.rs3.getString("to_currency"));

            }
            
        }catch(Exception ex){
           
        }
    }
    
}

