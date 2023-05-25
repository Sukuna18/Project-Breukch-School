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
    public function insertStudentClasse($idStudent, $libelle)
    {
        $sql = "INSERT INTO student_classe (id, id_classe) VALUES (?, (SELECT id_classe FROM classes WHERE libelle = ?))";
        $stmt = $this->db->getPDO()->prepare($sql);
        $stmt->execute([$idStudent, $libelle]);
        return $stmt->rowCount();
    }
   
    public function getAllClasses()
    {
        $sql = "SELECT libelle, id_niveau FROM Classes";
        $stmt = $this->db->getPDO()->query($sql);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function getAllNiveaux()
    {
        $sql = "SELECT * FROM Niveaux_scolaire";
        $stmt = $this->db->getPDO()->query($sql);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
