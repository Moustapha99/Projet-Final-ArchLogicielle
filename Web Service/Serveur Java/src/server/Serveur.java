package server;

import javax.xml.ws.Endpoint;

import service.GestionUser;

public class Serveur {
    public static void main(String[] args) {
        String url = "http://localhost:8080/GestionUser";
        Endpoint.publish(url, new GestionUser());
        System.out.println(url);
    }
}
