<?php

namespace App\Model;

use Core\Model;

class StudentModel extends Model
{
        public function getStudents()
    {
        $sql = "SELECT * FROM students";
        $result = $this->db->getPDO()->query($sql);
        return $result;
    }
    public function getAllStudents()
    {
        $sql = "SELECT * FROM students";
        $stmt = $this->db->getPDO()->query($sql);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function insertStudent($prenom, $nom, $numero, $birthday)
    {
        $sql = "INSERT INTO students (prenom, nom, numero, birthday) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->getPDO()->prepare($sql);
        $stmt->execute([$prenom, $nom, $numero, $birthday]);
        return $stmt->rowCount(); // Retourne le nombre de lignes insérées
    }
    public function updateStudent($id, $prenom, $nom, $numero, $birthday)
    {
        $sql = "UPDATE students SET prenom = ?, nom = ?, numero = ?, birthday = ? WHERE id = ?";
        $stmt = $this->db->getPDO()->prepare($sql);
        $stmt->execute([$prenom, $nom, $numero, $birthday, $id]);
        return $stmt->rowCount();
    }

    public function deleteStudent($id)
    {
        $sql = "DELETE FROM students WHERE id = ?";
        $stmt = $this->db->getPDO()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->rowCount();
    }
}
