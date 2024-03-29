package fr.jkb.geetudiants.concerner;

import java.io.Serializable;

import jakarta.persistence.Column;
import jakarta.persistence.EmbeddedId;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.Table;

@Entity
@Table(name = "Concerner")
public class ConcernerModel implements Serializable{

	@EmbeddedId
	private ConcernerID id;
	
	public ConcernerID getId() {
		return id;
	}
	
	public void setId(ConcernerID id) {
		this.id = id;
	}
	

	
}
