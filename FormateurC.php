<?php
include '../config.php';
include '../Model/Formateur.php';

class formateurC
{
    public function listformateur()
    {
        $sql = "SELECT * FROM formateur";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteformateur($id)
    {
        $sql = "DELETE FROM formateur WHERE idformateur = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addformateur($formateur)
    {
        $sql = "INSERT INTO formateur  
        VALUES (NULL, :fn,:ln, :ad,:dob)";
        $db = config::getConnexion();
        try {
            print_r($formateur->getDob()->format('Y-m-d'));
            $query = $db->prepare($sql);
            $query->execute([
                'fn' => $formateur->getFirstName(),
                'ln' => $formateur->getLastName(),
                'ad' => $formateur->getAddress(),
                'dob' => $formateur->getDob()->format('Y/m/d')
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateformateur($formateur, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE formateur SET 
                    firstName = :firstName, 
                    lastName = :lastName, 
                    address = :address, 
                    dob = :dob
                WHERE idformateur= :idformateur'
            );
            $query->execute([
                'idformateur' => $id,
                'firstName' => $formateur->getFirstName(),
                'lastName' => $formateur->getLastName(),
                'address' => $formateur->getAddress(),
                'dob' => $formateur->getDob()->format('Y/m/d')
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showformateur($id)
    {
        $sql = "SELECT * from formateur where idformateur = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $formateur = $query->fetch();
            return $formateur;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
