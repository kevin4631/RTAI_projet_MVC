package fr.jkb.geetudiants.concerner;

import java.io.Serializable;
import java.util.Objects;

public class ConcernerID implements Serializable {
	private int codeCours;
	private int codeDemandeM;

	public ConcernerID() {
		// TODO Auto-generated constructor stub
	}

	public ConcernerID(int codeCours, int codeDemandeM) {
		this.codeCours = codeCours;
		this.codeDemandeM = codeDemandeM;
	}

	public int getCodeCours() {
		return codeCours;
	}

	public void setCodeCours(int codeCours) {
		this.codeCours = codeCours;
	}

	public int getCodeDemandeM() {
		return codeDemandeM;
	}

	public void setCodeDemandeM(int codeDemandeM) {
		this.codeDemandeM = codeDemandeM;
	}

	@Override
	public int hashCode() {
		return Objects.hash(codeCours, codeDemandeM);
	}

	@Override
	public boolean equals(Object obj) {
		if (this == obj)
			return true;
		if (obj == null)
			return false;
		if (getClass() != obj.getClass())
			return false;
		ConcernerID other = (ConcernerID) obj;
		return codeCours == other.codeCours && codeDemandeM == other.codeDemandeM;
	}

}
