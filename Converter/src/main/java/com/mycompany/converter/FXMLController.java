package com.mycompany.converter;

import com.jfoenix.controls.JFXButton;
import java.io.IOException;
import java.net.URL;
import java.util.ResourceBundle;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.application.Platform;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Node;
import javafx.scene.Parent;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.input.MouseEvent;
import javafx.scene.layout.AnchorPane;
import javafx.scene.layout.BorderPane;
import javafx.stage.Stage;

public class FXMLController implements Initializable {
    
     
    
   
    @FXML
    private AnchorPane Pan;

    @FXML
    private Label label;

    @FXML
    public BorderPane Borderbox;

    @FXML
    private JFXButton menu_home;

    @FXML
    private JFXButton menu_temp;

    @FXML
    private JFXButton menu_time;

    @FXML
    private JFXButton menu_currency;

    @FXML
    private JFXButton menu_lenght;

    @FXML
    private JFXButton menu_mass;
    @FXML
    private JFXButton menu_login;

    @FXML
    private void handleButtonAction(ActionEvent event) throws IOException {
        Parent root = FXMLLoader.load(getClass().getResource("/fxml/menu_home.fxml"));
        Borderbox.setCenter(root);
        
        
        
        
    }
    @FXML
    private void menu(ActionEvent event)throws IOException{
        if(event.getSource()==menu_home){
            Parent root = FXMLLoader.load(getClass().getResource("/fxml/menu_home.fxml"));
            Borderbox.setCenter(root);
        }else if(event.getSource()==menu_temp){
            Parent root = FXMLLoader.load(getClass().getResource("/fxml/menu_temp.fxml"));
            Borderbox.setCenter(root);
        }else if(event.getSource()==menu_lenght){
            Parent root = FXMLLoader.load(getClass().getResource("/fxml/menu_lenght.fxml"));
            Borderbox.setCenter(root);
        }else if(event.getSource()==menu_mass){
            Parent root = FXMLLoader.load(getClass().getResource("/fxml/menu_mass.fxml"));
            Borderbox.setCenter(root);
        
        }else if(event.getSource()==menu_time){
            Parent root = FXMLLoader.load(getClass().getResource("/fxml/menu_time.fxml"));
            Borderbox.setCenter(root);
        }else if(event.getSource()==menu_currency){
            Parent root = FXMLLoader.load(getClass().getResource("/fxml/menu_currency.fxml"));
            Borderbox.setCenter(root);
        }else if(event.getSource()==menu_login){
            Parent root = FXMLLoader.load(getClass().getResource("/fxml/menu_currency_login.fxml"));
            Borderbox.setCenter(root);
            
        }
        
    }
    
    @Override
    public void initialize(URL url, ResourceBundle rb) {
         Parent root;
        try {
            root = FXMLLoader.load(getClass().getResource("/fxml/menu_home.fxml"));
            Borderbox.setCenter(root);
        } catch (IOException ex) {
            Logger.getLogger(FXMLController.class.getName()).log(Level.SEVERE, null, ex);
        }
            
    }    
    @FXML
    void close(MouseEvent event){
        Platform.exit();
    }
     @FXML
    void minimize(MouseEvent event){
        Stage app = (Stage) ((Node) event.getSource()).getScene().getWindow();
        app.setIconified(true);
    }
}
