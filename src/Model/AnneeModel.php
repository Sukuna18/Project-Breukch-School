<?php

namespace App\Model;
use Core\Model;

class AnneeModel extends Model{

    public function getAnneeById($id)
    {
        $sql = "SELECT * FROM Annees_scolaires WHERE id_annee_scolaire = ?";
        $stmt = $this->db->getPDO()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

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
    public function updateAnnee($id, $libelle)
    {
        $sql = "UPDATE Annees_scolaires SET libelle = ? WHERE id_annee_scolaire = ?";
        $stmt = $this->db->getPDO()->prepare($sql);
        $stmt->execute([$libelle, $id]);
        return $stmt->rowCount();
    }
    public function deleteAnnee($id)
    {
        $sql = "DELETE FROM Annees_scolaires WHERE id_annee_scolaire = ?";
        $stmt = $this->db->getPDO()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->rowCount();
    }

    

}