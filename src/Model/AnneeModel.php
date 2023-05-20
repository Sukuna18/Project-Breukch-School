<?php

namespace App\Model;
use Core\Model;

class AnneeModel extends Model{

    public function getAllAnnees()
    {
        $sql = "SELECT * FROM Annees_scolaires";
        $stmt = $this->db->getPDO()->query($sql);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function insertAnnee($libelle)
    {
        $sql = "INSERT INTO Annees_scolaires (libelle) VALUES (?)";
        $stmt = $this->db->getPDO()->prepare($sql);
        $stmt->execute([$libelle]);
        return $stmt->rowCount();
    }
    public function updateAnnee($id, $nom, $annee)
    {
        $sql = "UPDATE Annees_scolaires SET nom = ?, annee = ? WHERE id_annee_scolaire = ?";
        $stmt = $this->db->getPDO()->prepare($sql);
        $stmt->execute([$nom, $annee, $id]);
        return $stmt->rowCount();
    }

    

}