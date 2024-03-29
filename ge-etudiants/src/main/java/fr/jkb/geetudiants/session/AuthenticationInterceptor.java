package fr.jkb.geetudiants.session;


import org.springframework.stereotype.Component;
import org.springframework.web.servlet.HandlerInterceptor;

import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

@Component
public class AuthenticationInterceptor implements HandlerInterceptor {

    @Override
    public boolean preHandle(HttpServletRequest request, HttpServletResponse response, Object handler) throws Exception {
    	// Vérifier si la requête concerne une ressource statique (CSS, JS, images, etc.)
        String requestURI = request.getRequestURI();
        if (requestURI != null && (requestURI.endsWith(".css") || requestURI.endsWith(".js") || requestURI.endsWith(".png")
                || requestURI.endsWith(".jpg") || requestURI.endsWith(".gif"))) {
            return true; // Laisser le traitement des ressources statiques se poursuivre
        }

        // Vérifier si l'utilisateur est connecté
        if (request.getSession().getAttribute("sessionBean") == null) {
            // Rediriger vers la page de connexion
            response.sendRedirect(request.getContextPath() + "/connexion");
            return false; // Arrêter le traitement de la requête actuelle
        }
        return true; // Laisser la requête continuer vers le contrôleur
    }
}
