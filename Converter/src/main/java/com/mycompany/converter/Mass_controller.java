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
import sun.security.util.PropertyExpander;

/**
 *
 * @author f0r
 */
public class Mass_controller implements Initializable{
      @FXML
    private JFXComboBox mass_from_combobox;

    @FXML
    private JFXComboBox mass_to_combobox;

    @FXML
    private JFXTextField amounttext;

    @FXML
    private Text resulttext;
 double f;
    @FXML
    void convert(ActionEvent event) {
     try{
         //kg
         if(mass_from_combobox.getSelectionModel().getSelectedItem().toString().equals("kg") && mass_to_combobox.getSelectionModel().getSelectedItem().toString().equals("g") ){
              f=0;
              
              f=Double.valueOf(amounttext.getText().toString())/ 0.0010000;
            resulttext.setText(String.valueOf(f + " g"));
              
              
      }else if(mass_from_combobox.getSelectionModel().getSelectedItem().toString().equals("kg") && mass_to_combobox.getSelectionModel().getSelectedItem().toString().equals("mg") ){
            f=0;
              f=Double.valueOf(amounttext.getText().toString())/ 0.0000010000;
            resulttext.setText(String.valueOf(f +" mg"));
      }else if(mass_from_combobox.getSelectionModel().getSelectedItem().toString().equals("kg") && mass_to_combobox.getSelectionModel().getSelectedItem().toString().equals("pounds") ){
            f=0;
              f=Double.valueOf(amounttext.getText().toString())* 2.2046;
            resulttext.setText(String.valueOf(f +" pounds"));
            
            
            //g
      }else if(mass_from_combobox.getSelectionModel().getSelectedItem().toString().equals("g") && mass_to_combobox.getSelectionModel().getSelectedItem().toString().equals("kg") ){
            f=0;
              f=Double.valueOf(amounttext.getText().toString())/ 1000.0;
            resulttext.setText(String.valueOf(f +" kg"));
      }else if(mass_from_combobox.getSelectionModel().getSelectedItem().toString().equals("g") && mass_to_combobox.getSelectionModel().getSelectedItem().toString().equals("mg") ){
            f=0;
              f=Double.valueOf(amounttext.getText().toString())/0.0010000;
            resulttext.setText(String.valueOf(f +" mg"));
      }else if(mass_from_combobox.getSelectionModel().getSelectedItem().toString().equals("g") && mass_to_combobox.getSelectionModel().getSelectedItem().toString().equals("pounds") ){
            f=0;
              f=Double.valueOf(amounttext.getText().toString())* 0.0022046;
            resulttext.setText(String.valueOf(f +" pounds"));
            
            
            
            //mg
      }else if(mass_from_combobox.getSelectionModel().getSelectedItem().toString().equals("mg") && mass_to_combobox.getSelectionModel().getSelectedItem().toString().equals("kg") ){
            f=0;
              f=Double.valueOf(amounttext.getText().toString())/1000000;
            resulttext.setText(String.valueOf(f +" kg"));
      }else if(mass_from_combobox.getSelectionModel().getSelectedItem().toString().equals("mg") && mass_to_combobox.getSelectionModel().getSelectedItem().toString().equals("g") ){
            f=0;
              f=Double.valueOf(amounttext.getText().toString())/1000.0;
            resulttext.setText(String.valueOf(f +" g"));
      }else if(mass_from_combobox.getSelectionModel().getSelectedItem().toString().equals("mg") && mass_to_combobox.getSelectionModel().getSelectedItem().toString().equals("pounds") ){
            f=0;
              f=Double.valueOf(amounttext.getText().toString())* 0.0000022046;
            resulttext.setText(String.valueOf(f +" pounds"));
            
            
            //pounds
      }else if(mass_from_combobox.getSelectionModel().getSelectedItem().toString().equals("pounds") && mass_to_combobox.getSelectionModel().getSelectedItem().toString().equals("kg") ){
            f=0;
              f=Double.valueOf(amounttext.getText().toString())/2.2046;
            resulttext.setText(String.valueOf(f +" kg"));
      }else if(mass_from_combobox.getSelectionModel().getSelectedItem().toString().equals("pounds") && mass_to_combobox.getSelectionModel().getSelectedItem().toString().equals("g") ){
            f=0;
              f=Double.valueOf(amounttext.getText().toString())/0.0022046;
            resulttext.setText(String.valueOf(f +" g"));
      }else if(mass_from_combobox.getSelectionModel().getSelectedItem().toString().equals("pounds") && mass_to_combobox.getSelectionModel().getSelectedItem().toString().equals("mg") ){
            f=0;
              f=Double.valueOf(amounttext.getText().toString())/0.0000022046;
            resulttext.setText(String.valueOf(f +" mg"));
            
      }
     }catch(Exception ex){
         JOptionPane.showMessageDialog(null, ex);
     }
    }
    public void initialize(URL location, ResourceBundle resources) {
        mass_from_combobox.getItems().clear();
        mass_to_combobox.getItems().clear();
        mass_from_combobox.getItems().addAll("kg","g","mg","pounds");
        mass_to_combobox.getItems().addAll("kg","g","mg","pounds");
    }
    
}
