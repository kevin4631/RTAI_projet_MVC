package fr.jkb.geetudiants.contrats;

import java.time.LocalDateTime;
import java.util.ArrayList;
import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.servlet.ModelAndView;

import fr.jkb.geetudiants.etudiants.EtudiantModel;
import fr.jkb.geetudiants.etudiants.EtudiantRepository;
import fr.jkb.geetudiants.financement.FinancementRepository;
import fr.jkb.geetudiants.mobilites.MobiliteModel;
import fr.jkb.geetudiants.mobilites.MobiliteRepository;
import fr.jkb.geetudiants.programmes.ProgrammeModel;
import fr.jkb.geetudiants.programmes.ProgrammeRepository;
import fr.jkb.geetudiants.session.SessionBean;
import jakarta.servlet.http.HttpSession;
import fr.jkb.geetudiants.financement.FinancementModel;

@Controller
public class ContratController {

	@Autowired
	private ContratRepository contratRepository;

	@Autowired
	private MobiliteRepository mobiliteRepository;

	@Autowired
	private EtudiantRepository etudiantRepository;

	@Autowired
	private ProgrammeRepository programmeRepository;

	@Autowired
	private FinancementRepository financementRepository;
	
	@GetMapping("/contrats")
    public ModelAndView showContrats(HttpSession session) {
        ModelAndView mav = new ModelAndView();
        
        // Récupérer le SessionBean de la session
        SessionBean sessionBean = (SessionBean) session.getAttribute("sessionBean");    
        // Récupérer l'étudiant du SessionBean
        EtudiantModel etudiant = sessionBean.getEtudiant();

        String numE = etudiant.getNumEtudiant();

        Iterable<MobiliteModel>   mobilites     = mobiliteRepository.findByNumEtudiant(numE);
        ArrayList<String>         nomProgrammes = new ArrayList<>();
        ArrayList<ContratModel>   contrats      = new ArrayList<>();


        for (MobiliteModel mobilite : mobilites) {
            nomProgrammes.add(programmeRepository.findById(mobilite.getCodeProgramme()).get().getNomProgramme());
            Optional<ContratModel> contrat = contratRepository.findByCodeDemandeM(mobilite.getCodeDemandeM());
            if (!contrat.isEmpty()) {
                contrats.add(contrat.get());
            }
        }

        mav.addObject("contrats", contrats);
        mav.addObject("nomProgrammes", nomProgrammes);
        mav.setViewName("contrats/contrats");
        return mav;
    }
    
	@PostMapping("/creation-financement")
	public ModelAndView creeFinancement(HttpSession session, @RequestParam(value = "codeContrat", defaultValue = "absent") int codeContrat) {
		
		// Récupérer le SessionBean de la session
        SessionBean sessionBean = (SessionBean) session.getAttribute("sessionBean");    
        // Récupérer l'étudiant du SessionBean
        EtudiantModel etudiant = sessionBean.getEtudiant();
        
		String numE = etudiant.getNumEtudiant();

		FinancementModel financement = new FinancementModel();

		financement.setNumEtudiant(numE);
		financement.setCodeContrat(codeContrat);
		financement.setEtatDemandeF("en cours");
		financement.setDateDepotDemandeF(LocalDateTime.now());

		financementRepository.save(financement);

		return new ModelAndView("redirect:/demandes-financement");

	}
}
