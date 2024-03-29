package fr.jkb.geetudiants.contrats;

import java.util.Optional;

import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.CrudRepository;
import org.springframework.data.repository.query.Param;
import org.springframework.stereotype.Repository;

@Repository
public interface ContratRepository extends CrudRepository<ContratModel, Integer> {

    public Optional<ContratModel> findByCodeDemandeM(int codeDemandeM);

    @Query(value = "SELECT dureeEchange FROM Programmes WHERE codeProgramme = :codeProgramme", nativeQuery = true)
    public int nombreMois(@Param("codeProgramme") int codeProgramme); 
}

