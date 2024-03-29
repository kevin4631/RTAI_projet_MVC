package fr.jkb.geetudiants.diplomes;

import java.util.Optional;

import org.springframework.data.repository.CrudRepository;

import fr.jkb.geetudiants.etudiants.EtudiantModel;

public interface DiplomeRepository extends CrudRepository<DiplomeModel, Integer>{
    Optional<DiplomeModel> findCodeDiplomeByNomDiplome(String nomDiplome);
}
