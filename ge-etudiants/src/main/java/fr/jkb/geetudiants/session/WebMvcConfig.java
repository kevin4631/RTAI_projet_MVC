package fr.jkb.geetudiants.session;

import org.springframework.stereotype.Component;
import org.springframework.web.servlet.config.annotation.InterceptorRegistry;
import org.springframework.web.servlet.config.annotation.WebMvcConfigurer;

@Component
public class WebMvcConfig implements WebMvcConfigurer {

    @Override
    public void addInterceptors(InterceptorRegistry registry) {
        // Enregistrer l'interceptor pour toutes les URL sauf "/connexion"
        registry.addInterceptor(new AuthenticationInterceptor())
                .addPathPatterns("/**")
                .excludePathPatterns("/connexion").excludePathPatterns("/inscription");
    }
}
