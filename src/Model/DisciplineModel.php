<?php



namespace App\Model;

use Core\Model;

class DisciplineModel extends Model
{

  public function getAllGroupeDiscipline()
  {
    $sql = "SELECT * FROM Groupe_discipline";
    $result = $this->db->getPDO()->query($sql);
    return $result->fetchAll(\PDO::FETCH_ASSOC);
  }
//creer une fonction addGroupeDiscipline
  public function addGroupeDiscipline($libelle){
    $sql = "INSERT INTO Groupe_discipline (libelle) VALUES (?)";
    $result = $this->db->getPDO()->prepare($sql);
    $result->execute([$libelle]);
    return $result;
  }
  public function addDiscipline($discipline)
  {
    $code = strtoupper(substr($discipline, 0, 3));
    $idgroupe = $_POST['groupe_discipline'];
    
    $sql = "INSERT INTO Disciplines (libelle ,id_groupe_discipline ,code) VALUES (?, ?, ?)";
    $result = $this->db->getPDO()->prepare($sql);
    $result->execute([$discipline, $idgroupe, $code]);
    return $result;
  }
  
  public function getAllDiscipline()
  {
    $sql = "SELECT * FROM Disciplines";
    $result = $this->db->getPDO()->query($sql);
    return $result->fetchAll(\PDO::FETCH_ASSOC);
  }

  public function deleteDiscipline($id)
  {
    $sql = "DELETE FROM Disciplines WHERE id_discipline = ?";
    $result = $this->db->getPDO()->prepare($sql);
    $result->execute([$id]);
    return $result;
  }
  public function getLastInsertId()
  {
      $sql = "SELECT MAX(id_discipline) FROM Disciplines";
      $stmt = $this->db->getPDO()->query($sql);
      return $stmt->fetchAll(\PDO::FETCH_ASSOC)[0];
  }
  public function getAnneeActive()
  {
      $sql = "SELECT * FROM Annees_scolaires WHERE active = 1";
      $stmt = $this->db->getPDO()->query($sql);
      return $stmt->fetch(\PDO::FETCH_ASSOC);
  }
  public function addClasseDiscipline($classe){
    $lastInsertId = $this->getLastInsertId();
    $id_annee_scolaire = $this->getAnneeActive()['id_annee_scolaire'];
    $sql = "INSERT INTO Classe_discipline (id_annee_scolaire, id_classe, id_discipline, id_niveau) VALUES (?, ?, ?, ?)";
    $result = $this->db->getPDO()->prepare($sql);
    $result->execute([$id_annee_scolaire, $classe, $lastInsertId['MAX(id_discipline)'], 1]);
    return $result;

  }

}
