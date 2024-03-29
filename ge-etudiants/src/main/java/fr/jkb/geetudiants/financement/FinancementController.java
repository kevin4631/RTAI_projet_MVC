package fr.jkb.geetudiants.financement;

import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.servlet.ModelAndView;

import fr.jkb.geetudiants.etudiants.EtudiantModel;
import fr.jkb.geetudiants.session.SessionBean;
import jakarta.servlet.http.HttpSession;

@RestController
public class FinancementController {


    @Autowired // Récupérer le Bean userRepository auto-généré par Spring
    private FinancementRepository financementRepository;


    @GetMapping("/demandes-financement")
    public ModelAndView listDemandesFinancement(HttpSession session) {
        ModelAndView mav = new ModelAndView();
        
        // Récupérer le SessionBean de la session
        SessionBean sessionBean = (SessionBean) session.getAttribute("sessionBean");    
        // Récupérer l'étudiant du SessionBean
        EtudiantModel etudiant = sessionBean.getEtudiant();
        
        Iterable<FinancementModel> financement = financementRepository.findBynumEtudiant(etudiant.getNumEtudiant());
       
       
        mav.setViewName("financements/DemandeFinancement");
        mav.addObject("demandesFinancement", financement );
        return mav;
    }
}

