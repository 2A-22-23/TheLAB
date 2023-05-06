<?php
include '../config.php';
include '../Model/Formation.php';

class formationC
{
    public function listformation()
    {
        $sql = "SELECT * FROM formation";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteformation($id)
    {
        $sql = "DELETE FROM formation WHERE idformation = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addformation($formation)
    {
        $sql = "INSERT INTO formation  
        VALUES (NULL, :fn,:ln, :ad)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'fn' => $formation->gettypeformation(),
                'ln' => $formation->getprix(),
                'ad' => $formation->getduree()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateformation($formation, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE formation SET 
                    typeformation = :typeformation, 
                    prix = :prix, 
                    duree = :duree
                    
                WHERE idformation= :idformation'
            );
            $query->execute([
                'idformation' => $id,
                'typeformation' => $formation->gettypeformation(),
                'prix' => $formation->getprix(),
                'duree' => $formation->getduree()
                
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showformation($id)
    {
        $sql = "SELECT * from formation where idformation = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $formation = $query->fetch();
            return $formation;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
