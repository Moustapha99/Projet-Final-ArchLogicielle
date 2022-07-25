package metier;

import javax.xml.bind.annotation.XmlRootElement;

@XmlRootElement
public class User {
    private int id;
    private String nom;
    private String prenom;
    private String login;
    private String password;
    private static int lastId = 0;
    
    
    public User() 
    {
    	this.id = ++lastId;
    }
    public User(int id, String nom, String prenom, String login, int lastId, String password)  
    {
        this.id = id;
        this.nom = nom;
        this.prenom = prenom;
        this.login = login;
    	this.id = ++lastId;
    }

    public int getId() {
        return id;
    }
    public void setId(int id) {
        this.id = id;
    }

    public String getNom() {
        return nom;
    }
    public void setNom(String nom) {
        this.nom = nom;
    }

    public String getPrenom() {
        return prenom;
    }
    public void setPrenom(String prenom) {
        this.prenom = prenom;
    }

    public String getLogin() {
        return login;
    }
    public void setLogin(String login) {
        this.login = login;
    }

    public String getPassword() {
        return password;
    }
    public void setPassword(String password) {
        this.password = password;
    }


    @Override
    public String toString() {
        return "User{" + "id=" + id + ", nom=" + nom + ", prenom=" + prenom + ", login=" + login + ", password=" + password + '}';
  
    }
    

   
}
