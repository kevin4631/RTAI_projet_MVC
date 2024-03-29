package fr.jkb.geetudiants.etudiants;

import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.Table;

@Entity
@Table(name = "Etudiants")
public class EtudiantModel {

	@Id
	@Column(name = "numEtudiant", nullable = false)
	String numEtudiant;

	@Column(name = "nomEtudiant")
	String nomEtudiant;

	@Column(name = "prenomEtudiant")
	String prenomEtudiant;

	@Column(name = "mailEtudiant")
	String mailEtudiant;

	@Column(name = "annee")
	int annee;
	
	@Column(name = "codeDiplome")
	int codeDiplome;

	public String getNumEtudiant() {
		return numEtudiant;
	}

	public void setNumEtudiant(String numEtudiant) {
		this.numEtudiant = numEtudiant;
	}

	public String getNomEtudiant() {
		return nomEtudiant;
	}

	public void setNomEtudiant(String nomEtudiant) {
		this.nomEtudiant = nomEtudiant;
	}

	public String getPrenomEtudiant() {
		return prenomEtudiant;
	}

	public void setPrenomEtudiant(String prenomEtudiant) {
		this.prenomEtudiant = prenomEtudiant;
	}

	public String getMailEtudiant() {
		return mailEtudiant;
	}

	public void setMailEtudiant(String mailEtudiant) {
		this.mailEtudiant = mailEtudiant;
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
		return "EtudiantModel [numEtudiant=" + numEtudiant + ", nomEtudiant=" + nomEtudiant + ", prenomEtudiant=" + prenomEtudiant + ", mailEtudiant=" + mailEtudiant + ", annee=" + annee + ", codeDiplome=" + codeDiplome + "]";
	}
	
	

}
