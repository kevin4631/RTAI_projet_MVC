package fr.jkb.geetudiants.etudiants;

import java.util.Optional;

import org.springframework.data.repository.CrudRepository;


public interface EtudiantRepository extends CrudRepository<EtudiantModel, String>{

public Optional<EtudiantModel> findByMailEtudiantAndNumEtudiant(String mailEtudiant, String numEtudiant);
}
