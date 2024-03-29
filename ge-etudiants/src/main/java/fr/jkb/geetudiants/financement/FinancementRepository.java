package fr.jkb.geetudiants.financement;

import java.util.Optional;

import org.springframework.data.repository.CrudRepository;




public interface FinancementRepository extends CrudRepository<FinancementModel, Integer> {

    public Iterable<FinancementModel> findBynumEtudiant(String numEtudiant);

}
