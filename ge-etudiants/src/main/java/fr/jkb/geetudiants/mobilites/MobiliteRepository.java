package fr.jkb.geetudiants.mobilites;

import java.util.Optional;

import org.springframework.data.jpa.repository.Modifying;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.CrudRepository;
import org.springframework.data.repository.query.Param;
import org.springframework.stereotype.Repository;

import jakarta.transaction.Transactional;

@Repository
public interface MobiliteRepository extends CrudRepository<MobiliteModel, Integer> {
    
    public Iterable<MobiliteModel> findByNumEtudiant(String numEtudiant);

    @Modifying
    @Transactional
    @Query(value = "UPDATE DemandesMobilite SET etatDemandeM = 'validée' WHERE codeDemandeM = :codeDemandeM", nativeQuery = true)
    public void validationMobilite(@Param("codeDemandeM") int codeDemandeM);
}
