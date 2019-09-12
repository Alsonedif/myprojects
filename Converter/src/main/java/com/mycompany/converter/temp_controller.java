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
public class temp_controller implements Initializable{
      @FXML
    private JFXComboBox temp_from_combobox;

    @FXML
    private JFXComboBox temp_to_combobox;

    @FXML
    private JFXTextField amounttext;

    @FXML
    private Text resulttext;
    double f;

    @FXML
    void convert(ActionEvent event) {
    try{
        //Degree Celsius
          if(temp_from_combobox.getSelectionModel().getSelectedItem().toString().equals("Degree Celsius") && temp_to_combobox.getSelectionModel().getSelectedItem().toString().equals("Degree Fahrenheit") ){
              f=0;
              
              f=(Double.valueOf(amounttext.getText().toString())* 9/5) + 32;
            resulttext.setText(String.valueOf(f + " Fahrenheit"));
              
              
      }else if(temp_from_combobox.getSelectionModel().getSelectedItem().toString().equals("Degree Celsius") && temp_to_combobox.getSelectionModel().getSelectedItem().toString().equals("Kelvin") ){
            f=0;
              f=Double.valueOf(amounttext.getText().toString())+ 273.15;
            resulttext.setText(String.valueOf(f +" Kelvin"));
          
            
            
            
            
          //Degree Fahrenheit
    }else if(temp_from_combobox.getSelectionModel().getSelectedItem().toString().equals("Degree Fahrenheit") && temp_to_combobox.getSelectionModel().getSelectedItem().toString().equals("Degree Celsius") ){
            f=0;
               f=(Double.valueOf(amounttext.getText().toString())- 32) * 5/9;
            resulttext.setText(String.valueOf(f +" Celsius"));
    }  else if(temp_from_combobox.getSelectionModel().getSelectedItem().toString().equals("Degree Fahrenheit") && temp_to_combobox.getSelectionModel().getSelectedItem().toString().equals("Kelvin") ){
            f=0;
              f=(Double.valueOf(amounttext.getText().toString())- 32) * 5/9 + 273.15;
            resulttext.setText(String.valueOf(f +" Kelvin"));
            
            
            
            //Kelvin
    } else if(temp_from_combobox.getSelectionModel().getSelectedItem().toString().equals("Kelvin") && temp_to_combobox.getSelectionModel().getSelectedItem().toString().equals("Degree Celsius") ){
            f=0;
               f=Double.valueOf(amounttext.getText().toString())- 273.15;
            resulttext.setText(String.valueOf(f +" Celsius"));
    }  else if(temp_from_combobox.getSelectionModel().getSelectedItem().toString().equals("Kelvin") && temp_to_combobox.getSelectionModel().getSelectedItem().toString().equals("Degree Fahrenheit") ){
            f=0;
              f=(Double.valueOf(amounttext.getText().toString())- 273.15) * 9/5 + 32;
            resulttext.setText(String.valueOf(f +" Fahrenheit"));
    
    
    }
          
        
        
    }catch(Exception ex){
        JOptionPane.showMessageDialog(null, ex);
    }
    }
    @Override
    public void initialize(URL location, ResourceBundle resources) {
        temp_from_combobox.getItems().clear();
        temp_to_combobox.getItems().clear();
        temp_from_combobox.getItems().addAll("Degree Celsius","Degree Fahrenheit","Kelvin");
        temp_to_combobox.getItems().addAll("Degree Celsius","Degree Fahrenheit","Kelvin");
    }
    
}
