package fr.jkb.geetudiants;

import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;
import org.springframework.web.servlet.ModelAndView;

import fr.jkb.geetudiants.diplomes.DiplomeModel;
import fr.jkb.geetudiants.diplomes.DiplomeRepository;
import fr.jkb.geetudiants.etudiants.EtudiantModel;
import fr.jkb.geetudiants.etudiants.EtudiantRepository;
import fr.jkb.geetudiants.session.SessionBean;
import jakarta.servlet.http.HttpSession;

@RestController

public class ConnexionController {
	
	@Autowired
    private SessionBean sessionBean;
	
	@Autowired
	private EtudiantRepository etudiantRepository;
	
	@Autowired
	private DiplomeRepository diplomeRepository;

	@GetMapping("/connexion")
	public ModelAndView pageConnexion(HttpSession session) {
		// on empeche un utilisateur connecter de pourvoir de veni ici
		SessionBean sessionBean = (SessionBean) session.getAttribute("sessionBean");
		if (sessionBean != null) {
			return new ModelAndView("redirect:/home");
		}
				
		ModelAndView mnv = new ModelAndView();
		mnv.setViewName("connexion/connexion");
		return mnv;
	}
	
	@PostMapping("/connexion")
	public ModelAndView connexion(
			HttpSession session,
			@RequestParam("mailEtudiant") String mailEtudiant,
			@RequestParam("numEtudiant") String numEtudiant
			)
	{
		Optional<EtudiantModel> etudiant = etudiantRepository.findByMailEtudiantAndNumEtudiant(mailEtudiant,numEtudiant);
		
		if (etudiant.isEmpty()) {
			return new ModelAndView("redirect:/connexion");
		}
		sessionBean.setEtudiant(etudiant.get());
	    session.setAttribute("sessionBean", sessionBean);
		return new ModelAndView("redirect:/home");
	}
	
	
	@GetMapping("/deconnexion")
	public ModelAndView deconnexion(HttpSession session)
	{
		session.invalidate();
		return new ModelAndView("redirect:/connexion");
	}
	
	@GetMapping("/inscription")
	public ModelAndView moninscription(HttpSession session) {
		// on empeche un utilisateur connecter de pourvoir de veni ici
		SessionBean sessionBean = (SessionBean) session.getAttribute("sessionBean");
		if (sessionBean != null) {
			return new ModelAndView("redirect:/home");
		}
				
		ModelAndView mnv = new ModelAndView();
		mnv.setViewName("connexion/inscription");
		return mnv;
	}
	
	@PostMapping("/inscription")
	public ModelAndView inscription(
			@RequestParam("numEtudiant") String numEtudiant,
			@RequestParam("nomEtudiant") String nomEtudiant,
			@RequestParam("prenomEtudiant") String prenomEtudiant,
			@RequestParam("mailEtudiant") String mailEtudiant, 
			@RequestParam("annee") int annee,
			@RequestParam("nomDiplome") String nomDiplome)

	{
		Optional<DiplomeModel> codediplome = diplomeRepository.findCodeDiplomeByNomDiplome(nomDiplome);
		int codeDiplome = codediplome.get().getCodeDiplome();

		EtudiantModel nouveauEtudiant = new EtudiantModel();
		nouveauEtudiant.setNumEtudiant(numEtudiant);
		nouveauEtudiant.setNomEtudiant(nomEtudiant);
		nouveauEtudiant.setPrenomEtudiant(prenomEtudiant);
		nouveauEtudiant.setMailEtudiant(mailEtudiant);
		nouveauEtudiant.setAnnee(annee);
		nouveauEtudiant.setCodeDiplome(codeDiplome);
		etudiantRepository.save(nouveauEtudiant);
		return new ModelAndView("redirect:/connexion");
	}
	
	
	
}
