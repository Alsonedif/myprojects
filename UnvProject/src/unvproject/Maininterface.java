/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package unvproject;

import java.awt.Color;
import javax.swing.JOptionPane;

/**
 *
 * @author fahad
 */

public class Maininterface extends javax.swing.JFrame {
    //declaration of multiple String veribles
    String name;
    String name2;
    String Clist;
    String fromrate;
    String torate;
    String torate2;
    float fromratef;
    float toratef;
    float toratef2;
    DBconnect db=new DBconnect();
    public Maininterface() {
        initComponents();
        //getContentPane().setBackground(Color.ORANGE);
       //forcing the form to call this method when it's first running
       
        getdata();
        
                
    }

    /**
     * This method is called from within the constructor to initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is always
     * regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jPanel1 = new javax.swing.JPanel();
        jLabel1 = new javax.swing.JLabel();
        jLabel3 = new javax.swing.JLabel();
        convertbut = new javax.swing.JButton();
        fromnamelist = new javax.swing.JComboBox<>();
        tonamelist = new javax.swing.JComboBox<>();
        jLabel2 = new javax.swing.JLabel();
        jLabel4 = new javax.swing.JLabel();
        AmountText = new javax.swing.JTextField();
        jLabel5 = new javax.swing.JLabel();
        jLabel7 = new javax.swing.JLabel();
        Result = new javax.swing.JLabel();
        mini = new javax.swing.JToggleButton();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);
        setTitle("Currency Converter[Project]");
        setBackground(new java.awt.Color(255, 153, 0));
        setLocation(new java.awt.Point(500, 200));
        addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseEntered(java.awt.event.MouseEvent evt) {
                formMouseEntered(evt);
            }
        });

        jPanel1.setBackground(new java.awt.Color(255, 204, 51));
        jPanel1.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseEntered(java.awt.event.MouseEvent evt) {
                jPanel1MouseEntered(evt);
            }
        });

        jLabel1.setIcon(new javax.swing.ImageIcon(getClass().getResource("/unvproject/if_08_Exchange_1871408.png"))); // NOI18N

        convertbut.setText("convert");
        convertbut.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                convertbutActionPerformed(evt);
            }
        });

        fromnamelist.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                fromnamelistActionPerformed(evt);
            }
        });

        jLabel2.setText("From");

        jLabel4.setText("To");

        jLabel5.setText("Amount");

        jLabel7.setText("Result :");

        Result.setText("Null");

        mini.setText("Minimize");
        mini.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                miniMouseClicked(evt);
            }
        });

        javax.swing.GroupLayout jPanel1Layout = new javax.swing.GroupLayout(jPanel1);
        jPanel1.setLayout(jPanel1Layout);
        jPanel1Layout.setHorizontalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addGap(272, 291, Short.MAX_VALUE)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel1Layout.createSequentialGroup()
                        .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING, false)
                            .addGroup(jPanel1Layout.createSequentialGroup()
                                .addComponent(jLabel1)
                                .addGap(104, 104, 104))
                            .addGroup(jPanel1Layout.createSequentialGroup()
                                .addComponent(jLabel5)
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                                .addComponent(AmountText, javax.swing.GroupLayout.PREFERRED_SIZE, 70, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addGap(18, 18, 18)
                                .addComponent(jLabel7)
                                .addGap(18, 18, 18)
                                .addComponent(Result)
                                .addGap(55, 55, 55))
                            .addGroup(jPanel1Layout.createSequentialGroup()
                                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING, false)
                                    .addGroup(jPanel1Layout.createSequentialGroup()
                                        .addComponent(convertbut, javax.swing.GroupLayout.PREFERRED_SIZE, 175, javax.swing.GroupLayout.PREFERRED_SIZE)
                                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                                        .addComponent(mini, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
                                    .addGroup(jPanel1Layout.createSequentialGroup()
                                        .addComponent(jLabel2)
                                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                                        .addComponent(fromnamelist, javax.swing.GroupLayout.PREFERRED_SIZE, 97, javax.swing.GroupLayout.PREFERRED_SIZE)
                                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                                        .addComponent(jLabel4)
                                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                                        .addComponent(tonamelist, javax.swing.GroupLayout.PREFERRED_SIZE, 99, javax.swing.GroupLayout.PREFERRED_SIZE)))
                                .addGap(37, 37, 37)))
                        .addGap(221, 221, 221))
                    .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel1Layout.createSequentialGroup()
                        .addComponent(jLabel3)
                        .addGap(46, 46, 46))))
        );
        jPanel1Layout.setVerticalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jLabel1)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 72, Short.MAX_VALUE)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(fromnamelist, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(tonamelist, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabel4)
                    .addComponent(jLabel2))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel7)
                    .addComponent(Result, javax.swing.GroupLayout.PREFERRED_SIZE, 27, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(AmountText, javax.swing.GroupLayout.PREFERRED_SIZE, 30, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabel5))
                .addGap(28, 28, 28)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(convertbut, javax.swing.GroupLayout.PREFERRED_SIZE, 38, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(mini, javax.swing.GroupLayout.PREFERRED_SIZE, 38, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(147, 147, 147)
                .addComponent(jLabel3))
        );

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jPanel1, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jPanel1, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void fromnamelistActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_fromnamelistActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_fromnamelistActionPerformed

    private void formMouseEntered(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_formMouseEntered
        
        
    }//GEN-LAST:event_formMouseEntered

    private void convertbutActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_convertbutActionPerformed
        //call for convert method
        convert();
    }//GEN-LAST:event_convertbutActionPerformed

    private void jPanel1MouseEntered(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_jPanel1MouseEntered
       
        
    }//GEN-LAST:event_jPanel1MouseEntered

    private void miniMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_miniMouseClicked
        //call for minimize method
        minmize();
    }//GEN-LAST:event_miniMouseClicked

    /**
     * @param args the command line arguments
     */
    public static void main(String args[]) {
        /* Set the Nimbus look and feel */
        //<editor-fold defaultstate="collapsed" desc=" Look and feel setting code (optional) ">
        /* If Nimbus (introduced in Java SE 6) is not available, stay with the default look and feel.
         * For details see http://download.oracle.com/javase/tutorial/uiswing/lookandfeel/plaf.html 
         */
        try {
            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels()) {
                if ("Nimbus".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }
            }
        } catch (ClassNotFoundException ex) {
            java.util.logging.Logger.getLogger(Maininterface.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(Maininterface.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(Maininterface.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(Maininterface.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new Maininterface().setVisible(true);
            }
        });
    }
    public void convert(){
       //this is a method used to convert the currencies into other currencies
        try{
         getrate();
         fromratef = Float.parseFloat(fromrate);  
         toratef = Float.parseFloat(torate);
         toratef2 = Float.parseFloat(torate2);
         String check1;
        check1 = fromnamelist.getSelectedItem().toString();
        String check2;
        check2 = tonamelist.getSelectedItem().toString();
        float amount;
        amount = Float.parseFloat(AmountText.getText());
        float usd;
        float tocu;
        if(!check1.equals("USD") && !check2.equals("USD")){
            //converting the first selected currency to USD
            usd = (amount/fromratef);
            //converting to the secand selected currency
            tocu = (usd/toratef2);
            Result.setText(tocu+" "+check2);
            System.out.println(check2);
        }else if(check1.equals("USD") && !check2.equals("USD")){
            tocu = (amount/toratef2);
            Result.setText(tocu+" "+check2);
        }else if(!check1.equals("USD") && check2.equals("USD")){
            usd = (amount/fromratef);
            Result.setText(usd+" "+check2);
            System.out.println(fromratef);
        }
       }catch(Exception ex){
           JOptionPane.showMessageDialog(null, ex);
       }
        
        
    }
    public void getrate(){
        //this method used to get the rate of all the currencies in the database
        try{
            name=fromnamelist.getSelectedItem().toString();
            name2=tonamelist.getSelectedItem().toString();
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
public void getdata(){
    //this is a method used for getting the list of currenycies from the database
    try{
     String Q = ("select currency_type from currency");
     db.rs = db.st.executeQuery(Q);  
     
     while(db.rs.next()){
         
         Clist=db.rs.getString(1);
         
         fromnamelist.addItem(Clist);
         tonamelist.addItem(Clist);
     }
    }catch(Exception ex){
        JOptionPane.showMessageDialog(null, ex);
    } 
    
}
public void minmize(){
    //this is a method used for minimize this form 
    if(mini.isSelected()){
        minimize main=new minimize();
        main.setVisible(true);
        setVisible(false);
        
    }else{
        
    }
}

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JTextField AmountText;
    private javax.swing.JLabel Result;
    private javax.swing.JButton convertbut;
    private javax.swing.JComboBox<String> fromnamelist;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel jLabel2;
    private javax.swing.JLabel jLabel3;
    private javax.swing.JLabel jLabel4;
    private javax.swing.JLabel jLabel5;
    private javax.swing.JLabel jLabel7;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JToggleButton mini;
    private javax.swing.JComboBox<String> tonamelist;
    // End of variables declaration//GEN-END:variables
}