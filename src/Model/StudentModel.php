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
    public function getStudent($id)
    {
        $sql = "SELECT * FROM students WHERE id = $id";
        $result = $this->db->getPDO()->query($sql);
        return $result;
    }
    public function addStudent($prenom, $nom,$numero,$birthday)
    {
        $sql = "INSERT INTO students (prenom, nom, numero, birthday) VALUES ('$prenom', '$nom' , '$numero', $birthday)";
        try {
            $result = $this->db->getPDO()->query($sql);
            return $result;
        } catch(\PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function editStudent($id, $prenom, $nom, $numero,$birthday)
    {
        $sql = "UPDATE students SET prenom = '$prenom', nom = '$nom', numero = '$numero', birthday = '$birthday' WHERE id = $id";
        $result = $this->db->getPDO()->query($sql);
        return $result;
    }
    public function deleteStudent($id)
    {
        $sql = "DELETE FROM students WHERE id = $id";
        $result = $this->db->getPDO()->query($sql);
        return $result;
    }
}
