package fr.jkb.geetudiants.cours;

import org.springframework.data.repository.CrudRepository;

public interface CourRepository extends CrudRepository<CourModel, Integer> {

	public Iterable<CourModel> findBycodeDiplome(int codeDiplome);

}