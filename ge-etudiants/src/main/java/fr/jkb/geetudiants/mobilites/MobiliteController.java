package fr.jkb.geetudiants.mobilites;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.servlet.ModelAndView;

import fr.jkb.geetudiants.contrats.ContratModel;
import fr.jkb.geetudiants.contrats.ContratRepository;
import fr.jkb.geetudiants.etudiants.EtudiantModel;
import fr.jkb.geetudiants.session.SessionBean;
import jakarta.servlet.http.HttpSession;


@Controller
public class MobiliteController {

    @Autowired
    private MobiliteRepository mobiliteRepository;

    @Autowired
    private ContratRepository contratRepository;
    
    @GetMapping("/mobilites")
    public ModelAndView showMobilites(HttpSession session) {
        ModelAndView mav = new ModelAndView();
        
        // Récupérer le SessionBean de la session
        SessionBean sessionBean = (SessionBean) session.getAttribute("sessionBean");    
        // Récupérer l'étudiant du SessionBean
        EtudiantModel etudiant = sessionBean.getEtudiant();
        
        mav.setViewName("mobilites/mobilites");
        mav.addObject("mobilites", mobiliteRepository.findByNumEtudiant(etudiant.getNumEtudiant()));
        return mav;
    }
    
    @PostMapping("/create-contrat")
	public ModelAndView createContrat(
	        @RequestParam("codeDemandeM") int codeDemandeM,
	        @RequestParam("codeProgramme") int codeProgramme) {
	    // Récupération du nombre de mois à partir du codeProgramme
	    int nbMois = contratRepository.nombreMois(codeProgramme);

	    // Génération d'un contrat
	    ContratModel c = new ContratModel();
	    c.setDureeContrat(nbMois);
	    c.setEtatContrat("A réaliser");
	    c.setCodeDemandeM(codeDemandeM);
	    contratRepository.save(c);
	    
	    // Validation de la demande de Mobilité
	    mobiliteRepository.validationMobilite(codeDemandeM);

	    return new ModelAndView("redirect:/contrats");
	}
}
