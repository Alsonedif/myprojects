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
public class Lenght_controller implements Initializable{
     @FXML
    private JFXComboBox lenght_from_combobox;

    @FXML
    private JFXComboBox lenght_to_combobox;

    @FXML
    private JFXTextField amounttext;

    @FXML
    private Text resulttext;
    
    
    double f;

    @FXML
    void convert(ActionEvent event) {
      try{
          //feet
          if(lenght_from_combobox.getSelectionModel().getSelectedItem().toString().equals("feet") && lenght_to_combobox.getSelectionModel().getSelectedItem().toString().equals("meters") ){
              f=0;
              f=Double.valueOf(amounttext.getText().toString())/3.2808;
            resulttext.setText(String.valueOf(f + " meters"));
              
              
      }else if(lenght_from_combobox.getSelectionModel().getSelectedItem().toString().equals("feet") && lenght_to_combobox.getSelectionModel().getSelectedItem().toString().equals("miles") ){
            f=0;
              f=Double.valueOf(amounttext.getText().toString())*0.00018939;
            resulttext.setText(String.valueOf(f +" miles"));
          
          
    }else if(lenght_from_combobox.getSelectionModel().getSelectedItem().toString().equals("feet") && lenght_to_combobox.getSelectionModel().getSelectedItem().toString().equals("inches") ){
          f=0;
              f=Double.valueOf(amounttext.getText().toString())*12;
            resulttext.setText(String.valueOf(f+" inches"));
        
        
      }else if(lenght_from_combobox.getSelectionModel().getSelectedItem().toString().equals("feet") && lenght_to_combobox.getSelectionModel().getSelectedItem().toString().equals("yards") ){
              f=0;
              f=Double.valueOf(amounttext.getText().toString())*0.33333;
            resulttext.setText(String.valueOf(f+" yards"));
            
      }else if(lenght_from_combobox.getSelectionModel().getSelectedItem().toString().equals("feet") && lenght_to_combobox.getSelectionModel().getSelectedItem().toString().equals("cm") ){
              f=0;
              f=Double.valueOf(amounttext.getText().toString())/0.032808;
            resulttext.setText(String.valueOf(f+" cm"));     
            
            
            
            
   //miles         
    }else if(lenght_from_combobox.getSelectionModel().getSelectedItem().toString().equals("miles") && lenght_to_combobox.getSelectionModel().getSelectedItem().toString().equals("feet") ){
            f=0;
              f=Double.valueOf(amounttext.getText().toString())*5280;
            resulttext.setText(String.valueOf(f +" feet"));
          
          
    }else if(lenght_from_combobox.getSelectionModel().getSelectedItem().toString().equals("miles") && lenght_to_combobox.getSelectionModel().getSelectedItem().toString().equals("meters") ){
          f=0;
              f=Double.valueOf(amounttext.getText().toString())/0.00062137;
            resulttext.setText(String.valueOf(f+" meters"));
        
        
      }else if(lenght_from_combobox.getSelectionModel().getSelectedItem().toString().equals("miles") && lenght_to_combobox.getSelectionModel().getSelectedItem().toString().equals("inches") ){
              f=0;
              f=Double.valueOf(amounttext.getText().toString())*63360;
            resulttext.setText(String.valueOf(f+" inches"));
    }else if(lenght_from_combobox.getSelectionModel().getSelectedItem().toString().equals("miles") && lenght_to_combobox.getSelectionModel().getSelectedItem().toString().equals("yards") ){
              f=0;
              f=Double.valueOf(amounttext.getText().toString())*1760;
            resulttext.setText(String.valueOf(f+" yards"));
            
    }else if(lenght_from_combobox.getSelectionModel().getSelectedItem().toString().equals("miles") && lenght_to_combobox.getSelectionModel().getSelectedItem().toString().equals("cm") ){
              f=0;
              f=Double.valueOf(amounttext.getText().toString())/0.0000062137;
            resulttext.setText(String.valueOf(f+" cm"));       
            
            
            
  //meters          
    }else if(lenght_from_combobox.getSelectionModel().getSelectedItem().toString().equals("meters") && lenght_to_combobox.getSelectionModel().getSelectedItem().toString().equals("feet") ){
              f=0;
              f=Double.valueOf(amounttext.getText().toString())*3.2808;
            resulttext.setText(String.valueOf(f+" feet"));
    }else if(lenght_from_combobox.getSelectionModel().getSelectedItem().toString().equals("meters") && lenght_to_combobox.getSelectionModel().getSelectedItem().toString().equals("miles") ){
              f=0;
              f=Double.valueOf(amounttext.getText().toString())*0.00062137;
            resulttext.setText(String.valueOf(f+" miles"));
    }else if(lenght_from_combobox.getSelectionModel().getSelectedItem().toString().equals("meters") && lenght_to_combobox.getSelectionModel().getSelectedItem().toString().equals("inches") ){
              f=0;
              f=Double.valueOf(amounttext.getText().toString())*39.370;
            resulttext.setText(String.valueOf(f+" inches"));
    }else if(lenght_from_combobox.getSelectionModel().getSelectedItem().toString().equals("meters") && lenght_to_combobox.getSelectionModel().getSelectedItem().toString().equals("yards") ){
              f=0;
              f=Double.valueOf(amounttext.getText().toString())*1.0936;
            resulttext.setText(String.valueOf(f+" yards"));
    }else if(lenght_from_combobox.getSelectionModel().getSelectedItem().toString().equals("meters") && lenght_to_combobox.getSelectionModel().getSelectedItem().toString().equals("cm") ){
              f=0;
              f=Double.valueOf(amounttext.getText().toString())/0.01;
          resulttext.setText(String.valueOf(f+" cm"));
          
          
          
          
          
          
          //inches
          
    }else if(lenght_from_combobox.getSelectionModel().getSelectedItem().toString().equals("inches") && lenght_to_combobox.getSelectionModel().getSelectedItem().toString().equals("meters") ){
              f=0;
              f=Double.valueOf(amounttext.getText().toString())/39.370;
          resulttext.setText(String.valueOf(f+" meters"));
    }else if(lenght_from_combobox.getSelectionModel().getSelectedItem().toString().equals("inches") && lenght_to_combobox.getSelectionModel().getSelectedItem().toString().equals("feet") ){
              f=0;
              f=Double.valueOf(amounttext.getText().toString())*0.083333;
          resulttext.setText(String.valueOf(f+" feet"));
    }else if(lenght_from_combobox.getSelectionModel().getSelectedItem().toString().equals("inches") && lenght_to_combobox.getSelectionModel().getSelectedItem().toString().equals("miles") ){
              f=0;
              f=Double.valueOf(amounttext.getText().toString())*0.000015783;
          resulttext.setText(String.valueOf(f+" miles"));
    }else if(lenght_from_combobox.getSelectionModel().getSelectedItem().toString().equals("inches") && lenght_to_combobox.getSelectionModel().getSelectedItem().toString().equals("yards") ){
              f=0;
              f=Double.valueOf(amounttext.getText().toString())*0.027778;
          resulttext.setText(String.valueOf(f+" yards"));
    }else if(lenght_from_combobox.getSelectionModel().getSelectedItem().toString().equals("inches") && lenght_to_combobox.getSelectionModel().getSelectedItem().toString().equals("cm") ){
              f=0;
              f=Double.valueOf(amounttext.getText().toString())/0.39370;
          resulttext.setText(String.valueOf(f+" cm"));
          
          
          
          
          
          //yards
    }else if(lenght_from_combobox.getSelectionModel().getSelectedItem().toString().equals("yards") && lenght_to_combobox.getSelectionModel().getSelectedItem().toString().equals("meters") ){
              f=0;
              f=Double.valueOf(amounttext.getText().toString())/1.0936;
          resulttext.setText(String.valueOf(f+" meters"));
    }else if(lenght_from_combobox.getSelectionModel().getSelectedItem().toString().equals("yards") && lenght_to_combobox.getSelectionModel().getSelectedItem().toString().equals("feet") ){
              f=0;
              f=Double.valueOf(amounttext.getText().toString())*3;
          resulttext.setText(String.valueOf(f+" feet"));
    }else if(lenght_from_combobox.getSelectionModel().getSelectedItem().toString().equals("yards") && lenght_to_combobox.getSelectionModel().getSelectedItem().toString().equals("miles") ){
              f=0;
              f=Double.valueOf(amounttext.getText().toString())*0.00056818;
          resulttext.setText(String.valueOf(f+" miles"));
    }else if(lenght_from_combobox.getSelectionModel().getSelectedItem().toString().equals("yards") && lenght_to_combobox.getSelectionModel().getSelectedItem().toString().equals("inches") ){
              f=0;
              f=Double.valueOf(amounttext.getText().toString())*36;
          resulttext.setText(String.valueOf(f+" inches"));
    }else if(lenght_from_combobox.getSelectionModel().getSelectedItem().toString().equals("yards") && lenght_to_combobox.getSelectionModel().getSelectedItem().toString().equals("cm") ){
              f=0;
              f=Double.valueOf(amounttext.getText().toString())/0.010936;
          resulttext.setText(String.valueOf(f+" cm"));
          
          
          
          
          
          
          //cm
    }else if(lenght_from_combobox.getSelectionModel().getSelectedItem().toString().equals("cm") && lenght_to_combobox.getSelectionModel().getSelectedItem().toString().equals("meters") ){
              f=0;
              f=Double.valueOf(amounttext.getText().toString())/100;
          resulttext.setText(String.valueOf(f+" meters"));
    }else if(lenght_from_combobox.getSelectionModel().getSelectedItem().toString().equals("cm") && lenght_to_combobox.getSelectionModel().getSelectedItem().toString().equals("feet") ){
              f=0;
              f=Double.valueOf(amounttext.getText().toString())*0.032808;
          resulttext.setText(String.valueOf(f+" feet"));
    }else if(lenght_from_combobox.getSelectionModel().getSelectedItem().toString().equals("cm") && lenght_to_combobox.getSelectionModel().getSelectedItem().toString().equals("miles") ){
              f=0;
              f=Double.valueOf(amounttext.getText().toString())*0.0000062137;
          resulttext.setText(String.valueOf(f+" miles"));
    }else if(lenght_from_combobox.getSelectionModel().getSelectedItem().toString().equals("cm") && lenght_to_combobox.getSelectionModel().getSelectedItem().toString().equals("inches") ){
              f=0;
              f=Double.valueOf(amounttext.getText().toString())*0.39370;
          resulttext.setText(String.valueOf(f+" inches"));
    }else if(lenght_from_combobox.getSelectionModel().getSelectedItem().toString().equals("cm") && lenght_to_combobox.getSelectionModel().getSelectedItem().toString().equals("yards") ){
              f=0;
              f=Double.valueOf(amounttext.getText().toString())*0.010936;
          resulttext.setText(String.valueOf(f+" yards"));
          
    }
          
          
          
      }catch(Exception ex){
          JOptionPane.showMessageDialog(null, ex);
      }
        
    }
    public void initialize(URL location, ResourceBundle resources) {
        lenght_from_combobox.getItems().clear();
        lenght_to_combobox.getItems().clear();
        lenght_from_combobox.getItems().addAll("meters","feet","miles","inches","yards","cm");
        lenght_to_combobox.getItems().addAll("meters","feet","miles","inches","yards","cm");
    }
    
}
