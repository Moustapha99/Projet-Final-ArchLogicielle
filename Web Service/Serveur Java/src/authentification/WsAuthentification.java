package authentification;

import javax.jws.WebMethod;
import javax.jws.WebService;



@WebService
public interface WsAuthentification {
    @WebMethod
    public String authTest();
}
