public class Article {

    private int id;
    private String titre;
    private String contenu;
    // private date dateCreation;
    // private String dateModification;
    private String categorie;

    
    public Article(int id, String titre, String contenu, String categorie) {
        this.id = id;
        this.titre = titre;
        this.contenu = contenu;
        this.categorie = categorie;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getTitre() {
        return titre;
    }

    public void setTitre(String titre) {
        this.titre = titre;
    }

    public String getContenu() {
        return contenu;
    }

    public void setContenu(String contenu) {
        this.contenu = contenu;
    }

    public String getCategorie() {
        return categorie;
    }

    public void setCategorie(String categorie) {
        this.categorie = categorie;
    }

    





}