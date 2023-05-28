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
}