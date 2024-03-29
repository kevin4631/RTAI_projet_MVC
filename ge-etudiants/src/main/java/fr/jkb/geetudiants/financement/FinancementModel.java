package fr.jkb.geetudiants.financement;

import java.time.LocalDateTime;


import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.Table;

	@Entity 	// Indique à hibernate que cette classe correspondra à une table dans la base de données
	@Table(name="DemandesFinancement")		// Indique à Hibernate la table correspondant au modèle
	public class FinancementModel {

		@Id
	    @GeneratedValue(strategy = GenerationType.IDENTITY)
	    @Column(name = "codeDemandeF", nullable = false)
		int codeDemandeF;

		@Column(name="dateDepotDemandeF")
		LocalDateTime dateDepotDemandeF;

		@Column(name="etatDemandeF")
		String etatDemandeF;
		
		@Column(name="montantDemandeF")
		float montantDemandeF;
		
		@Column(name="codeContrat")
		int codeContrat;
		
		@Column(name="numEtudiant")
		String numEtudiant;

		public int getCodeDemandeF() {
			return codeDemandeF;
		}

		public void setCodeDemandeF(int codeDemandeF) {
			this.codeDemandeF = codeDemandeF;
		}

		public LocalDateTime getDateDepotDemandeF() {
			return dateDepotDemandeF;
		}

		public void setDateDepotDemandeF(LocalDateTime dateDepotDemandeF) {
			this.dateDepotDemandeF = dateDepotDemandeF;
		}

		public String getEtatDemandeF() {
			return etatDemandeF;
		}

		public void setEtatDemandeF(String etatDemandeF) {
			this.etatDemandeF = etatDemandeF;
		}

		public float getMontantDemandeF() {
			return montantDemandeF;
		}

		public void setMontantDemandeF(float montantDemandeF) {
			this.montantDemandeF = montantDemandeF;
		}

		public int getCodeContrat() {
			return codeContrat;
		}

		public void setCodeContrat(int codeContrat) {
			this.codeContrat = codeContrat;
		}

		public String getNumEtudiant() {
			return numEtudiant;
		}

		public void setNumEtudiant(String numEtudiant) {
			this.numEtudiant = numEtudiant;
		}

		@Override
		public String toString() {
			return "FinancementModel [codeDemandeF=" + codeDemandeF + ", dateDepotDemandeF=" + dateDepotDemandeF
					+ ", etatDemandeF=" + etatDemandeF + ", montantDemandeF=" + montantDemandeF + ", codeContrat="
					+ codeContrat + ", numEtudiant=" + numEtudiant + "]";
		}

		
		
}
