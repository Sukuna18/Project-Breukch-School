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
    public function insertStudent($prenom, $nom, $numero, $birthday)
    {
        $sql = "INSERT INTO students (prenom, nom, numero, birthday) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->getPDO()->prepare($sql);
        $stmt->execute([$prenom, $nom, $numero, $birthday]);
        return $stmt->rowCount();
    }
    public function updateStudent($id, $prenom, $nom, $birthday)
    {
        $sql = "UPDATE students SET prenom = ?, nom = ?, birthday = ? WHERE id = ?";
        $stmt = $this->db->getPDO()->prepare($sql);
        $stmt->execute([$prenom, $nom, $birthday, $id]);
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
