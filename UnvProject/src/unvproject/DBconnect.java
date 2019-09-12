//this is a connection class .. we use this to connect to the database
package unvproject;

import java.sql.*;


public class DBconnect {
    public Connection con;
    public Statement st;
    public ResultSet rs;
    public ResultSet rs2;
    public ResultSet rs3;
    public Statement st2;
    public ResultSet rs4;
    public Statement st3;
    public Statement st4;
    public int adminlogin;
    
    public DBconnect(){
       try{
        Class.forName("com.mysql.jdbc.Driver");
        con = DriverManager.getConnection("jdbc:mysql://sql11.freemysqlhosting.net:3306/sql11211836","sql11211836","BCbwF48A1g");
        st = con.createStatement();
        st2 = con.createStatement();
        st3 = con.createStatement();
        st4 = con.createStatement();
    }catch(Exception ex){
            
            System.out.println(ex);
            } 
        
        
        
    }
    public void getData(){
         try{
           String query = "select * from users";
           rs = st.executeQuery(query);
           System.out.println("Records :");
           
           while(rs.next()){
             String id=rs.getString("id");
             String username=rs.getString("username");
            String password=rs.getString("password");
            System.out.println("ID Is : "+id+","+" Username is : "+username+","+" Password is : "+password);                                               
        }
        }catch(Exception ex){
            System.out.println(ex);
        }
    }
    
}
