<?php


namespace App\Model;
use Core\Model;

class NiveauModel extends Model
{
  public function getAllNiveaux()
  {
      $sql = "SELECT * FROM Niveaux_scolaire";
      $stmt = $this->db->getPDO()->query($sql);
      return $stmt->fetchAll(\PDO::FETCH_ASSOC);
  }
  //recuperer libelle annee ou active = 1
  public function getAnneeActive()
  {
    $sql = "SELECT * FROM Annees_scolaires WHERE active = 1";
    $stmt = $this->db->getPDO()->query($sql);
    return $stmt->fetch(\PDO::FETCH_ASSOC);
  }
}