package fr.jkb.geetudiants.diplomes;

import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.Table;

@Entity
@Table(name = "Diplomes")
public class DiplomeModel {

	@Id
	@GeneratedValue(strategy = GenerationType.IDENTITY)
	@Column(name = "codeDiplome", nullable = false)
	int codeDiplome;

	@Column(name = "nomDiplome")
	String nomDiplome;

	@Column(name = "niveauDiplome")
	String niveauDiplome;

	@Column(name = "codeU")
	int codeU;

	public int getCodeDiplome() {
		return codeDiplome;
	}

	public void setCodeDiplome(int codeDiplome) {
		this.codeDiplome = codeDiplome;
	}

	public String getNomDiplome() {
		return nomDiplome;
	}

	public void setNomDiplome(String nomDiplome) {
		this.nomDiplome = nomDiplome;
	}

	public String getNiveauDiplome() {
		return niveauDiplome;
	}

	public void setNiveauDiplome(String niveauDiplome) {
		this.niveauDiplome = niveauDiplome;
	}

	public int getCodeU() {
		return codeU;
	}

	public void setCodeU(int codeU) {
		this.codeU = codeU;
	}

	@Override
	public String toString() {
		return "DiplomeModel [codeDiplome=" + codeDiplome + ", nomDiplome=" + nomDiplome + ", niveauDiplome=" + niveauDiplome + ", codeU=" + codeU + "]";
	}
	
	

}



