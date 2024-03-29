package fr.jkb.geetudiants.universites;

import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.Table;


@Entity
@Table(name = "Universites")
public class UniversiteModel {

	@Id
	@GeneratedValue(strategy = GenerationType.IDENTITY)
	@Column(name = "codeU", nullable = false)
	int codeU;

	@Column(name = "nomU")
	String nomU;

	@Column(name = "villeU")
	String villeU;

	@Column(name = "paysU")
	String paysU;

	@Column(name = "webU")
	String webU;

	public int getCodeU() {
		return codeU;
	}

	public void setCodeU(int codeU) {
		this.codeU = codeU;
	}

	public String getNomU() {
		return nomU;
	}

	public void setNomU(String nomU) {
		this.nomU = nomU;
	}

	public String getVilleU() {
		return villeU;
	}

	public void setVilleU(String villeU) {
		this.villeU = villeU;
	}

	public String getPaysU() {
		return paysU;
	}

	public void setPaysU(String paysU) {
		this.paysU = paysU;
	}

	public String getWebU() {
		return webU;
	}

	public void setWebU(String webU) {
		this.webU = webU;
	}

	@Override
	public String toString() {
		return "UniversiteModel [codeU=" + codeU + ", nomU=" + nomU + ", villeU=" + villeU + ", paysU=" + paysU + ", webU=" + webU + "]";
	}
	
	
}



