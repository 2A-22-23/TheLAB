<?php
require('C:/xampp/htdocs/fpdf/fpdfassistant.php');

// Connexion à la base de données avec PDO
$dsn = "mysql:host=localhost;dbname=projetweb";
$user = "root";
$password = "";
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);

try {
    $conn = new PDO($dsn, $user, $password, $options);
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}

// Requête SQL pour récupérer les données
$sql = "SELECT * FROM assistant";
$result = $conn->query($sql);

// Création du PDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);

while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $pdf->Cell(40,10,$row['idassistant'],1);
    $pdf->Cell(40,10,$row['nom'],1);
    $pdf->Cell(80,10,$row['adresseEmail'],1);
    $pdf->Cell(30,10,$row['subject'],1);
    $pdf->Ln();
}

// Envoi du PDF au navigateur
$pdf->Output('F', 'C:/xampp/htdocs/freshshop-master/assistant.pdf');
?>
