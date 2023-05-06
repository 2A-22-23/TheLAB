<?php
include '../config.php';
include '../Model/Assistant.php';

class assistantC
{
    public function listassistant()
    {
        $sql = "SELECT * FROM assistant";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteassistant($id)
    {
        $sql = "DELETE FROM assistant WHERE idassistant = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addassistant($assistant)
    {
        $sql = "INSERT INTO assistant  
        VALUES (NULL, :fn,:ln, :ad)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'fn' => $assistant->getnom(),
                'ln' => $assistant->getadresseEmail(),
                'ad' => $assistant->getsubject()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateassistant($assistant, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE assistant SET 
                    nom = :nom, 
                    adresseEmail = :adresseEmail, 
                    subject = :subject 
                WHERE idassistant= :idassistant'
            );
            $query->execute([
                'idassistant' => $id,
                'nom' => $assistant->getnom(),
                'adresseEmail' => $assistant->getadresseEmail(),
                'subject' => $assistant->getsubject()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showassistant($id)
    {
        $sql = "SELECT * from assistant where idassistant = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $assistant = $query->fetch();
            return $assistant;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
