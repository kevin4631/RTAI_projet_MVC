package fr.jkb.geetudiants.session;

import java.util.UUID;

import org.springframework.context.annotation.ScopedProxyMode;
import org.springframework.context.annotation.Scope;
import org.springframework.stereotype.Component;

import fr.jkb.geetudiants.etudiants.EtudiantModel;

@Component
@Scope(value="session", proxyMode = ScopedProxyMode.TARGET_CLASS)
public class SessionBean {
	
	private final String id = UUID.randomUUID().toString();
	private EtudiantModel etudiant;
	
	public String getId() {
		return id;
	}
	
	public void setEtudiant(EtudiantModel etudiant) {
		this.etudiant = etudiant;
	}
	
	public EtudiantModel getEtudiant() {
		return etudiant;
	}
	
}
