package fr.jkb.geetudiants.mobilites;
import java.time.LocalDateTime;
import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.Table;

@Entity
@Table(name = "DemandesMobilite")
public class MobiliteModel {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "codeDemandeM")
    private int codeDemandeM;

    @Column(name = "dateDepotDemandeM")
    private LocalDateTime dateDepotDemandeM;

    @Column(name = "etatDemandeM")
    private String etatDemandeM;

    @Column(name = "numEtudiant")
    private String numEtudiant;

    @Column(name = "codeProgramme")
    private int codeProgramme;

	public int getCodeDemandeM() {
		return codeDemandeM;
	}

	public void setCodeDemandeM(int codeDemandeM) {
		this.codeDemandeM = codeDemandeM;
	}

	public LocalDateTime getDateDepotDemandeM() {
		return dateDepotDemandeM;
	}

	public void setDateDepotDemandeM(LocalDateTime dateDepotDemandeM) {
		this.dateDepotDemandeM = dateDepotDemandeM;
	}

	public String getEtatDemandeM() {
		return etatDemandeM;
	}

	public void setEtatDemandeM(String etatDemandeM) {
		this.etatDemandeM = etatDemandeM;
	}

	public String getNumEtudiant() {
		return numEtudiant;
	}

	public void setNumEtudiant(String numEtudiant) {
		this.numEtudiant = numEtudiant;
	}

	public int getCodeProgramme() {
		return codeProgramme;
	}

	public void setCodeProgramme(int codeProgramme) {
		this.codeProgramme = codeProgramme;
	}

	@Override
	public String toString() {
		return "MobiliteModel [codeDemandeM=" + codeDemandeM + ", dateDepotDemandeM=" + dateDepotDemandeM + ", etatDemandeM="
				+ etatDemandeM + ", numEtudiant=" + numEtudiant + ", codeProgramme=" + codeProgramme + "]";
	}
}
