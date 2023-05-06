<?php
// Inclure le fichier autoload.php de PhpSpreadsheet
require_once 'vendor/autoload.php';

// Connexion à la base de données
$conn = new PDO('mysql:host=localhost;dbname=projetweb', 'root', '');

// Requête SQL pour récupérer les données
$sql = "SELECT * FROM assistant";
$result = $conn->query($sql);

// Créer un objet Spreadsheet
$spreadsheet = new PhpOffice\PhpSpreadsheet\Spreadsheet();

// Définir la feuille de calcul active
$worksheet = $spreadsheet->getActiveSheet();
$worksheet->setTitle('Assitants');

// Ajouter les en-têtes de colonne
$worksheet->setCellValue('A1', 'ID')
          ->setCellValue('B1', 'Nom')
          ->setCellValue('C1', 'Adresse')
          ->setCellValue('D1', 'Subject');

// Ajouter les données de la base de données
$row = 2;
while ($data = $result->fetch(PDO::FETCH_ASSOC)) {
    $worksheet->setCellValue('A'.$row, $data['idassistant'])
              ->setCellValue('B'.$row, $data['nom'])
              ->setCellValue('C'.$row, $data['adresseEmail'])
              ->setCellValue('D'.$row, $data['subject']);
    $row++;
}

// Enregistrer le fichier Excel
$writer = new PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
$writer->save('assistants.xlsx');
