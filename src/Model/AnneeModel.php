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
    public function activeAnnee($id)
    {
        
        $activeAnnee = $this->getAnneeActive();
        if ($activeAnnee) {
            $this->disableAnnee($activeAnnee['id_annee_scolaire']);
        }
        $sql = "UPDATE Annees_scolaires SET active = 1 WHERE id_annee_scolaire = ?";
        $stmt = $this->db->getPDO()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->rowCount();
    }
    public function disableAnnee($id)
    {
        $sql = "UPDATE Annees_scolaires SET active = 0 WHERE id_annee_scolaire = ?";
        $stmt = $this->db->getPDO()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->rowCount();
    }
    public function getAnneeActive()
    {
        $sql = "SELECT * FROM Annees_scolaires WHERE active = 1";
        $stmt = $this->db->getPDO()->query($sql);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    

}