<?php

namespace App\Model;

use Core\Model;

class StudentModel extends Model
{
    public function getStudentsId($id)
    {
        $sql = "SELECT * FROM students WHERE id = $id";
        $stmt = $this->db->getPDO()->query($sql);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC)[0];
    }
    public function getAllStudents()
    {
        $sql = "SELECT * FROM students ORDER BY prenom ASC ";
        $stmt = $this->db->getPDO()->query($sql);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function insertStudent($prenom, $nom, $numero, $birthday, $naissance, $sexe)
    {
        $sql = "INSERT INTO students (prenom, nom, numero, birthday, lieu_naissance, sexe) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->getPDO()->prepare($sql);
        $stmt->execute([$prenom, $nom, $numero, $birthday, $naissance, $sexe]);
        return $stmt->rowCount();
    }
    public function updateStudent($id, $prenom, $nom, $birthday, $naissance, $sexe)
    {
        $sql = "UPDATE students SET prenom = ?, nom = ?, birthday = ?, lieu_naissance = ?, sexe = ? WHERE id = ?";
        $stmt = $this->db->getPDO()->prepare($sql);
        $stmt->execute([$prenom, $nom, $birthday, $naissance, $sexe, $id]);
        return $stmt->rowCount();
    }

    public function deleteStudent($id)
    {
        $sql = "DELETE FROM students WHERE id = ?";
        $stmt = $this->db->getPDO()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->rowCount();
    }
    public function insertStudentClasse($idStudent, $idClasse)
    {
        $sql = "INSERT INTO Student_Classe (id, id_classe, id_annee_scolaire) VALUES (?, ?, (SELECT id_annee_scolaire FROM Annees_scolaires WHERE active = 1))";
        $stmt = $this->db->getPDO()->prepare($sql);
        $stmt->execute([$idStudent, $idClasse]);
        return $stmt->rowCount();
    }

    public function getAllClasses()
    {
        $sql = "SELECT * FROM Classes";
        $stmt = $this->db->getPDO()->query($sql);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function getAllNiveaux()
    {
        $sql = "SELECT * FROM Niveaux_scolaire";
        $stmt = $this->db->getPDO()->query($sql);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function getLastInsertId()
    {
        $sql = "SELECT MAX(id) FROM students";
        $stmt = $this->db->getPDO()->query($sql);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC)[0];
    }
    public function getAnneeActive()
    {
        $sql = "SELECT * FROM Annees_scolaires WHERE active = 1";
        $stmt = $this->db->getPDO()->query($sql);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    public function getStudentsByClasse($idClasse)
    {
        $activeAnnee = $this->getAnneeActive();
    
        $sql = "SELECT s.* FROM students s
                INNER JOIN Student_Classe sc ON s.id = sc.id
                WHERE sc.id_classe = :idClasse
                AND sc.id_annee_scolaire = :idAnneeScolaire";
    
        $stmt = $this->db->getPDO()->prepare($sql);
        $stmt->bindValue(':idClasse', $idClasse, \PDO::PARAM_INT);
        $stmt->bindValue(':idAnneeScolaire', $activeAnnee['id_annee_scolaire'], \PDO::PARAM_INT);
        $stmt->execute();
    
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
}
