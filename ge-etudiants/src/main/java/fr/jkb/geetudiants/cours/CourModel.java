package fr.jkb.geetudiants.cours;

import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.Table;

@Entity
@Table(name = "Cours")
public class CourModel {

	@Id
	@GeneratedValue(strategy = GenerationType.IDENTITY)
	@Column(name = "codeCours", nullable = false)
	int codeCours;

	@Column(name = "LibelleCours")
	String LibelleCours;

	@Column(name = "nbECTS")
	int nbECTS;

	@Column(name = "annee")
	int annee;

	@Column(name = "codeDiplome")
	int codeDiplome;

	public int getCodeCours() {
		return codeCours;
	}

	public void setCodeCours(int codeCours) {
		this.codeCours = codeCours;
	}

	public String getLibelleCours() {
		return LibelleCours;
	}

	public void setLibelleCours(String libelleCours) {
		LibelleCours = libelleCours;
	}

	public int getNbECTS() {
		return nbECTS;
	}

	public void setNbECTS(int nbECTS) {
		this.nbECTS = nbECTS;
	}

	public int getAnnee() {
		return annee;
	}

	public void setAnnee(int annee) {
		this.annee = annee;
	}

	public int getCodeDiplome() {
		return codeDiplome;
	}

	public void setCodeDiplome(int codeDiplome) {
		this.codeDiplome = codeDiplome;
	}

	@Override
	public String toString() {
		return "CourModel [codeCours=" + codeCours + ", LibelleCours=" + LibelleCours + ", nbECTS=" + nbECTS + ", annee=" + annee + ", codeDiplome=" + codeDiplome + "]";
	}

	
	


}
