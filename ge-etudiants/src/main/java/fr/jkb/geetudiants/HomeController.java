package fr.jkb.geetudiants;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.servlet.ModelAndView;

import fr.jkb.geetudiants.etudiants.EtudiantModel;
import fr.jkb.geetudiants.session.SessionBean;
import jakarta.servlet.http.HttpSession;

@Controller
public class HomeController {

	@GetMapping({"/","/home"})
	public ModelAndView home(HttpSession session) { 
		ModelAndView mav = new ModelAndView();
		
		// Récupérer le SessionBean de la session
        SessionBean sessionBean = (SessionBean) session.getAttribute("sessionBean");    
        // Récupérer l'étudiant du SessionBean
        EtudiantModel etudiant = sessionBean.getEtudiant();
      
		mav.addObject("etudiant", etudiant);
		mav.setViewName("home"); 
		return mav; 
		}
}

	