package service;

import java.util.ArrayList;

import javax.jws.WebParam;
import javax.jws.WebService;

import java.sql.*;
import java.util.*;

import metier.User;

@WebService
public class GestionUser 
{
    String dbURL = "jdbc:mysql://localhost:3306/GestionUser";
    String dbUser = "root";
    String dbPassword = "";

    String sql;
    
    private static ArrayList<User> users = new ArrayList<User>();

    //methode pour ajouter un utilisateur
    public Boolean ajouter(@WebParam(name="nom")String nom,
                           @WebParam(name="prenom") String prenom, 
                           @WebParam(name="login") String login,
                           @WebParam(name="password") String password)
    {
        try {
            Connection conn = DriverManager.getConnection(dbURL, dbUser, dbPassword);
            PreparedStatement statement;
            
            // Ajouter utilisateur
            sql = "INSERT INTO Users (nom, prenom, login, password) VALUES (?, ?, ?, ?)";
            
            statement = conn.prepareStatement(sql);
            statement.setString(1, nom);
            statement.setString(2, prenom);
            statement.setString(3, login);
            statement.setString(4, password);
            
            int rowsInserted = statement.executeUpdate();
            if (rowsInserted > 0) {
                System.out.println("Ajout reussi!");
            }
            
            conn.close();
            return true;
        } 
        catch (SQLException e) {
            e.printStackTrace();
            return false;
        }
    }
   
    //methode pour modifier un utilisateur  
    public Boolean modifier(@WebParam(name="id")int id, @WebParam(name="nom") String nom,
                            @WebParam(name="prenom") String prenom, @WebParam(name="login") String login,
                            @WebParam(name="password") String password)
    {
        try {
            Connection conn = DriverManager.getConnection(dbURL, dbUser, dbPassword);
            PreparedStatement statement;
            
            // Modifier utilisateur
            sql = "UPDATE Users SET nom = ?, prenom = ?, login = ?, password = ? WHERE id = ?";
            
            statement = conn.prepareStatement(sql);
            statement.setString(1, nom);
            statement.setString(2, prenom);
            statement.setString(3, login);
            statement.setString(4, password);
            statement.setInt(5, id);
            
            int rowsUpdated = statement.executeUpdate();
            if (rowsUpdated > 0) {
                System.out.println("Modification reussi!");
            }
            
            conn.close();
            return true;
        } 
        catch (SQLException e) {
            e.printStackTrace();
            return false;
        }
    }

    //methode pour supprimer un utilisateur
    public Boolean supprimer(@WebParam(name="id")int id)
    {
        try {
            Connection conn = DriverManager.getConnection(dbURL, dbUser, dbPassword);
            PreparedStatement statement;
            
            // Supprimer utilisateur
            sql = "DELETE FROM Users WHERE id = ?";
            
            statement = conn.prepareStatement(sql);
            statement.setInt(1, id);
            
            int rowsDeleted = statement.executeUpdate();
            if (rowsDeleted > 0) {
                System.out.println("Suppression reussie!");
            }
            
            conn.close();
            return true;
        } 
        catch (SQLException e) {
            e.printStackTrace();
            return false;
        }
    }

    //methode pour lister des utilisateurs
    public ArrayList<User> lister()
    {
        try {
            Connection conn = DriverManager.getConnection(dbURL, dbUser, dbPassword);
            PreparedStatement statement;
            
            // Lister utilisateurs
            sql = "SELECT * FROM Users";
            
            statement = conn.prepareStatement(sql);
            
            ResultSet result = statement.executeQuery();
            while (result.next()) {
                User user = new User();
                user.setId(result.getInt("id"));
                user.setNom(result.getString("nom"));
                user.setPrenom(result.getString("prenom"));
                user.setLogin(result.getString("login"));
                user.setPassword(result.getString("password"));
                users.add(user);
            }
            
            conn.close();
            return users;
        } 
        catch (SQLException e) {
            e.printStackTrace();
            return null;
        }
    }

    //methode pour s'authentifier

    
    @WebMethod(operationName="authentification")
	public boolean authentification (@WebParam(name="login") String login, @WebParam(name="password") String password) {
		String query = "select login,password from user";
		boolean connexion=false;
		
		try {
            Connection conn = DriverManager.getConnection(dbURL, dbUser, dbPassword);
			PreparedStatement statement = conn.prepareStatement(query);
			ResultSet rs=statement.executeQuery();
			while(rs.next()) {
				if(password.equals(rs.getString("password"))==true && login.equals(rs.getString("login"))==true) {				
					connexion=true;
					break;
				}
			}
			if(connexion==true) {
				System.out.println("Connexion reussie");
			}
			else {
				System.out.println("login ou mot de passe incorrect");
			}
		}
		catch(SQLException e) {
			e.printStackTrace();
            connexion = false;
        }
        return connexion;
}
}

