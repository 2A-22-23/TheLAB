<?php
include '../config.php';
include '../Model/Probleme.php';

class problemeC
{
    public function listprobleme()
    {
        $sql = "SELECT * FROM probleme";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteprobleme($id)
    {
        $sql = "DELETE FROM probleme WHERE idprobleme = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addprobleme($probleme)
    {
        $sql = "INSERT INTO probleme  
        VALUES (NULL, :fn,:dC)";
        $db = config::getConnexion();
        try {
            print_r($probleme->getdateCreation()->format('Y-m-d'));
            $query = $db->prepare($sql);
            $query->execute([
                'fn' => $probleme->getdescription(),
                'dC' => $probleme->getdateCreation()->format('Y/m/d')
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateprobleme($probleme, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE probleme SET 
                    description = :description,  
                    dateCreation = :dateCreation
                WHERE idprobleme= :idprobleme'
            );
            $query->execute([
                'idprobleme' => $id,
                'description' => $probleme->getdescription(),
                'dateCreation' => $probleme->getdateCreation()->format('Y/m/d')
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showprobleme($id)
    {
        $sql = "SELECT * from probleme where idprobleme = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $probleme = $query->fetch();
            return $probleme;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
