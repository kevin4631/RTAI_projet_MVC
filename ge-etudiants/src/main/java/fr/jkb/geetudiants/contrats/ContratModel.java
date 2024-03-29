package fr.jkb.geetudiants.contrats;



import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.Table;

@Entity
@Table(name = "Contrats")
public class ContratModel {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "codeContrat")
     int codeContrat;

    @Column(name = "dureeContrat")
     int dureeContrat;

    @Column(name = "etatContrat")
     String etatContrat;

    @Column(name = "codeDemandeM")
     int codeDemandeM;

	public int getCodeContrat() {
		return codeContrat;
	}

	public void setCodeContrat(int codeContrat) {
		this.codeContrat = codeContrat;
	}

	public int getDureeContrat() {
		return dureeContrat;
	}

	public void setDureeContrat(int dureeContrat) {
		this.dureeContrat = dureeContrat;
	}

	public String getEtatContrat() {
		return etatContrat;
	}

	public void setEtatContrat(String etatContrat) {
		this.etatContrat = etatContrat;
	}

	public int getCodeDemandeM() {
		return codeDemandeM;
	}

	public void setCodeDemandeM(int codeDemandeM) {
		this.codeDemandeM = codeDemandeM;
	}
	@Override
	public String toString() {
	    return "ContratModel [codeContrat=" + codeContrat + ", dureeContrat=" + dureeContrat
	            + ", etatContrat=" + etatContrat + ", codeDemandeM=" + codeDemandeM + "]";
	}

    
}