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
public class Time_controller implements Initializable{
    @FXML
    private JFXComboBox time_from_combobox;

    @FXML
    private JFXComboBox time_to_combobox;

    @FXML
    private JFXTextField amounttext;

    @FXML
    private Text resulttext;
     double f;
    @FXML
    void convert(ActionEvent event) {
    try{
        
        //secands
        if(time_from_combobox.getSelectionModel().getSelectedItem().toString().equals("seconds") && time_to_combobox.getSelectionModel().getSelectedItem().toString().equals("minutes") ){
              f=0;
              
              f=Double.valueOf(amounttext.getText().toString())/ 60;
            resulttext.setText(String.valueOf(f + " minutes"));
              
              
      }else if(time_from_combobox.getSelectionModel().getSelectedItem().toString().equals("seconds") && time_to_combobox.getSelectionModel().getSelectedItem().toString().equals("hours") ){
            f=0;
              f=Double.valueOf(amounttext.getText().toString())/ 3600;
            resulttext.setText(String.valueOf(f +" hours"));
      
            
            
            
            //minutes
            
      }else if(time_from_combobox.getSelectionModel().getSelectedItem().toString().equals("minutes") && time_to_combobox.getSelectionModel().getSelectedItem().toString().equals("seconds") ){
            f=0;
              f=Double.valueOf(amounttext.getText().toString())*60;
            resulttext.setText(String.valueOf(f +" seconds"));
      }else if(time_from_combobox.getSelectionModel().getSelectedItem().toString().equals("minutes") && time_to_combobox.getSelectionModel().getSelectedItem().toString().equals("hours") ){
           f=0;
              f=Double.valueOf(amounttext.getText().toString())*1/60;
              
            resulttext.setText(String.valueOf(f +" hours"));
      
            
            
            
            
          //hours  
      }else if(time_from_combobox.getSelectionModel().getSelectedItem().toString().equals("hours") && time_to_combobox.getSelectionModel().getSelectedItem().toString().equals("seconds") ){
            f=0;
              f=Double.valueOf(amounttext.getText().toString())*3600;
            resulttext.setText(String.valueOf(f +" seconds"));
      }else if(time_from_combobox.getSelectionModel().getSelectedItem().toString().equals("hours") && time_to_combobox.getSelectionModel().getSelectedItem().toString().equals("minutes") ){
           f=0;
              f=Double.valueOf(amounttext.getText().toString())*60;
              
            resulttext.setText(String.valueOf(f +" minutes"));
      }
        
    }catch(Exception ex){
        JOptionPane.showMessageDialog(null, ex);
    }
    }
    @Override
    public void initialize(URL location, ResourceBundle resources) {
        time_from_combobox.getItems().clear();
        time_to_combobox.getItems().clear();
        time_from_combobox.getItems().addAll("seconds","minutes","hours");
        time_to_combobox.getItems().addAll("seconds","minutes","hours");
    }
    
}
