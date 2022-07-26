package service;

import java.util.List;
import java.util.Scanner;

public class UserCl {

	public static void main(String[] args) {
		UserWS stub = new GestionUserService().getUserWSPort();
		Scanner sc = new Scanner(System.in);
		
		int choix=0;
		
		System.out.println("Bienvenue sur l'appli de gestion des Utilisateurs");
		System.out.println("");
		System.out.println("----------------------------------------------");
		System.out.println("----------------------------------------------");
		System.out.println("----------------------------------------------");
		System.out.println("");
		System.out.println("1. Ajouter un utilisateur");
		System.out.println("2. Afficher la liste des utilisateur");
		System.out.println("3. Modifer les informations d'un utilisateur");
		System.out.println("4. Supprimer un utilisateur");
		System.out.println("");
		System.out.println("Vous devez d'abord vous authentifier");
		System.out.println("----------------------------------------------");
		System.out.println("----------------------------------------------");
		System.out.println("----------------------------------------------");
		System.out.println("");
		

		String login;
		String password;
		String nom;
		String prenom;
		int role;
		
		boolean e=false;
		
		do{
			System.out.println("Entrez votre login");
			login=sc.nextLine();
			System.out.println("Entrez votre password");
			password=sc.nextLine();
			e=stub.authentification(login, password);
		}while(e==false);
		
		System.out.println("Quel est votre choix");
		choix=sc.nextInt();
		
		switch(choix){
			case 1 : 
			Scanner sc1 = new Scanner(System.in);
			Scanner sc2 = new Scanner(System.in);
                System.out.println("Veuillez entrer le nom de l'utilisateur");
                nom = sc1.nextLine();
                System.out.println("Veuillez entrer le prenom de l'utilisateur");
                prenom = sc1.nextLine();
                System.out.println("Veuillez entrer le login de l'utilisateur");
                login = sc1.nextLine();
                System.out.println("Veuillez entrer le role de l'utilisateur");
                System.out.println("---1. Administrateur---");
                System.out.println("---2. Editeur---");
                System.out.println("---3. Visiteur---");
                role = sc1.nextInt();
                System.out.println("Veuillez entrer le mot de passe de l'utilisateur");
                password = sc2.nextLine();

                // Ajouter utilisateur
                
                stub.ajouter(nom, prenom, role, login, password);
                
                break;
            case 2 :

                //Afficher la liste des utilisateurs
            	List <User> et1= stub.lister();
            	
    			for(User et : et1) {
    				System.out.println(et.getPrenom() + " " + et.getNom());
            	stub.lister();
    			}
                 
                break;
            case 3 :
                    // Modifier utilisateur
                    
                    System.out.println("Veuillez entrer l'ID de l'utilisateur");
                    int id = sc.nextInt();
                    sc.nextLine();
                    System.out.println("Entrer le nouveau nom de l'utilisateur");
                    nom = sc.nextLine();
                    System.out.println("Entrer le nouveau prenom de l'utilisateur");
                    prenom = sc.nextLine();
                    System.out.println("Entrer le nouveau role de l'utilisateur");
                    role = sc.nextInt();
                    System.out.println("Entrer le nouveau login de l'utilisateur");
                    login = sc.nextLine(); 
                    System.out.println("Entrer le nouveau mot de passe de l'utilisateur");
                    password = sc.nextLine();
                    
                    stub.modifier(id, nom, prenom, role, login, password);
                     
                break;
            case 4 : 
                    // Supprimer utilisateur
            	System.out.println("Veuillez entrer l'ID de l'utilisateur");
            	id = sc.nextInt();
            	stub.supprimer(id);
                  
                   
                break;
			default:
				System.out.println("Bonne journee");
		}
		sc.close();
	}	
}


