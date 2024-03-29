package fr.jkb.geetudiants.programmes;

import fr.jkb.geetudiants.diplomes.DiplomeModel;
import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.JoinColumn;
import jakarta.persistence.ManyToOne;
import jakarta.persistence.Table;

@Entity
@Table(name = "Programmes")
public class ProgrammeModel {
	
	@Id
	@GeneratedValue(strategy = GenerationType.IDENTITY)
	@Column(name = "codeProgramme", nullable = false)
	int codeProgramme;

	@Column(name = "nomProgramme")
	String nomProgramme;
	
	@Column(name = "dureeEchange")
	int dureeEchange;
	
	@Column(name = "codeDiplome")
	int codeDiplome;
	
	@Column(name = "codeDiplome_1")
	int codeDiplome_1;
	
	public int getCodeProgramme() {
		return codeProgramme;
	}

	public void setCodeProgramme(int codeProgramme) {
		this.codeProgramme = codeProgramme;
	}

	public String getNomProgramme() {
		return nomProgramme;
	}

	public void setNomProgramme(String nomProgramme) {
		this.nomProgramme = nomProgramme;
	}

	public int getDureeEchange() {
		return dureeEchange;
	}

	public void setDureeEchange(int dureeEchange) {
		this.dureeEchange = dureeEchange;
	}

	public int getCodeDiplome() {
		return codeDiplome;
	}

	public void setCodeDiplome(int codeDiplome) {
		this.codeDiplome = codeDiplome;
	}

	public int getCodeDiplome_1() {
		return codeDiplome_1;
	}

	public void setCodeDiplome_1(int codeDiplome_1) {
		this.codeDiplome_1 = codeDiplome_1;
	}

	@Override
	public String toString() {
		return "ProgrammeModel [codeProgramme=" + codeProgramme + ", nomProgramme=" + nomProgramme + ", dureeEchange="
				+ dureeEchange + ", codeDiplome=" + codeDiplome +", codeDiplome_1=" + codeDiplome_1 + "]";
	}
	
	
}