<?php
    namespace App\Model;
    use Core\Model;


    class ClasseModel extends Model
    {
        public function getAllClasses()
        {
            $sql = "SELECT * FROM Classes";
            $stmt = $this->db->getPDO()->query($sql);
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
        public function insertClasse($libelle)
        {
            $sql = "INSERT INTO Classes (libelle) VALUES (?)";
            $stmt = $this->db->getPDO()->prepare($sql);
            $stmt->execute([$libelle]);
            return $stmt->rowCount();
        }
        public function updateClasse($id, $nom, $annee)
        {
            $sql = "UPDATE Classes SET nom = ?, annee = ? WHERE id_classe = ?";
            $stmt = $this->db->getPDO()->prepare($sql);
            $stmt->execute([$nom, $annee, $id]);
            return $stmt->rowCount();
        }

        public function deleteClasse($id)
        {
            $sql = "DELETE FROM Classes WHERE id_classe = ?";
            $stmt = $this->db->getPDO()->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->rowCount();
        }
        public function getClassesByNiveau($idNiveau)
        {
            $sql = "SELECT c.* FROM Classes c
                    INNER JOIN Niveaux_scolaire n ON c.id_niveau = n.id_niveau
                    WHERE n.id_niveau = :idNiveau";
            $stmt = $this->db->getPDO()->prepare($sql);
            $stmt->bindValue(':idNiveau', $idNiveau, \PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }