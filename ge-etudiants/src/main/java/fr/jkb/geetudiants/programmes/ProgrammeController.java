package fr.jkb.geetudiants.programmes;

import java.time.LocalDateTime;
import java.util.ArrayList;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.servlet.ModelAndView;

import fr.jkb.geetudiants.etudiants.EtudiantModel;
import fr.jkb.geetudiants.etudiants.EtudiantRepository;
import fr.jkb.geetudiants.mobilites.MobiliteModel;
import fr.jkb.geetudiants.mobilites.MobiliteRepository;
import fr.jkb.geetudiants.session.SessionBean;
import fr.jkb.geetudiants.universites.UniversiteModel;
import fr.jkb.geetudiants.universites.UniversiteRepository;
import jakarta.servlet.http.HttpSession;
import fr.jkb.geetudiants.concerner.ConcernerID;
import fr.jkb.geetudiants.concerner.ConcernerModel;
import fr.jkb.geetudiants.concerner.ConcernerRepository;
import fr.jkb.geetudiants.cours.CourModel;
import fr.jkb.geetudiants.cours.CourRepository;
import fr.jkb.geetudiants.diplomes.DiplomeModel;
import fr.jkb.geetudiants.diplomes.DiplomeRepository;



@Controller
public class ProgrammeController {
	
	@Autowired // Récupérer le Bean
	private ProgrammeRepository programmeRepository;

	@Autowired // Récupérer le Bean
	private EtudiantRepository etudiantRepository;

	@Autowired // Récupérer le Bean
	private CourRepository courRepository;

	@Autowired // Récupérer le Bean
	private DiplomeRepository diplomeRepository;

	@Autowired // Récupérer le Bean
	private UniversiteRepository universiteRepository;
	
	@Autowired // Récupérer le Bean
	private MobiliteRepository mobiliteRepository;

	@Autowired // Récupérer le Bean
	private ConcernerRepository concernerRepository;


	
	@GetMapping("/programmes")
	public ModelAndView showProgrammes(HttpSession session) {
		ModelAndView mav = new ModelAndView();
		
		// Récupérer le SessionBean de la session
        SessionBean sessionBean = (SessionBean) session.getAttribute("sessionBean");    
        // Récupérer l'étudiant du SessionBean
        EtudiantModel etudiant = sessionBean.getEtudiant();
		
		int codeDiplome = etudiant.getCodeDiplome();
		
		ArrayList<ProgrammeModel> programmes = programmeRepository.findBycodeDiplome(codeDiplome);

		// recup la liste des diplomes assoocié aux programmes
		ArrayList<DiplomeModel> diplomes = new ArrayList<>();
		for (ProgrammeModel programme : programmes) {
			diplomes.add(diplomeRepository.findById(programme.getCodeDiplome_1()).get());
		}

		// recup la liste des univ assoocié aux programmes
		ArrayList<UniversiteModel> univs = new ArrayList<>();
		for (DiplomeModel diplome : diplomes) {
			univs.add(universiteRepository.findById(diplome.getCodeU()).get());
		}

		DiplomeModel diplomeEtudiant = diplomeRepository.findById(codeDiplome).get();
		UniversiteModel univEtudiant = universiteRepository.findById(diplomeEtudiant.getCodeU()).get();

		mav.addObject("programmes", programmes);
		mav.addObject("diplomes", diplomes);
		mav.addObject("univs", univs);
		mav.addObject("diplomeEtudiant", diplomeEtudiant);
		mav.addObject("univEtudiant", univEtudiant);

		mav.setViewName("programmes/programmes_all");
		return mav;
	}

	
	@GetMapping("/programmes/choix/{codeProgramme}")
	public ModelAndView selectionCours(@PathVariable int codeProgramme) {
		ModelAndView mav = new ModelAndView();
		
		ProgrammeModel programmeEchange = programmeRepository.findById(codeProgramme).get();
		DiplomeModel diplomeEchange = diplomeRepository.findById(programmeEchange.getCodeDiplome_1()).get();
		UniversiteModel univEchange = universiteRepository.findById(diplomeEchange.getCodeU()).get();
		Iterable<CourModel> coursEchange = courRepository.findBycodeDiplome(diplomeEchange.getCodeDiplome());

		
		mav.addObject("coursEchange", coursEchange);
		mav.addObject("programmeEchange", programmeEchange);
		mav.addObject("univEchange", univEchange);
		mav.addObject("diplomeEchange", diplomeEchange);

		mav.setViewName("programmes/programmes_cours");
		return mav;
	}
	
	@PostMapping("/programmes/createDemandeMobilite")
	public ModelAndView createDemandeMobilite(
			HttpSession session,
			@RequestParam(value="codeProgramme", defaultValue="absent") int codeProgramme,
	        @RequestParam(value = "choixcours", required = true) ArrayList<Integer> choixCours
			){
		MobiliteModel mobilite = new MobiliteModel();
      
		// Récupérer le SessionBean de la session
        SessionBean sessionBean = (SessionBean) session.getAttribute("sessionBean");    
        // Récupérer l'étudiant du SessionBean
        EtudiantModel etudiant = sessionBean.getEtudiant();
        
        
		mobilite.setCodeProgramme(codeProgramme);
		mobilite.setDateDepotDemandeM(LocalDateTime.now());
		mobilite.setEtatDemandeM("en cours");
		mobilite.setNumEtudiant(etudiant.getNumEtudiant());
		mobiliteRepository.save(mobilite);

		
		for (Integer codeCours : choixCours) {
			ConcernerModel concerner = new ConcernerModel();
			
			concerner.setId(new ConcernerID());
			concerner.getId().setCodeDemandeM(mobilite.getCodeDemandeM());
			concerner.getId().setCodeCours(codeCours);
			concernerRepository.save(concerner);
		}
		
		mobiliteRepository.save(mobilite);
		return new ModelAndView("redirect:/home");
	}
	

}
