package fr.jkb.geetudiants.programmes;

import java.util.ArrayList;
import java.util.List;

import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.CrudRepository;
import org.springframework.data.repository.query.Param;

public interface ProgrammeRepository extends CrudRepository<ProgrammeModel, Integer> {

	public ArrayList<ProgrammeModel> findBycodeDiplome(int id);

	@Query("FROM ProgrammeModel WHERE codeDiplome = ?1")
	public Iterable<ProgrammeModel> findByDiplomeJPQL(int codeDiplome);

	@Query(value = "SELECT * FROM Programmes p WHERE p.codeDiplome = :codeDiplome", nativeQuery = true)
	public Iterable<ProgrammeModel> findByDiplomeNative(@Param("codeDiplome") Integer codeDiplome);

}