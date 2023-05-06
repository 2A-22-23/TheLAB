<?php
include '../Controller/FormateurC.php';
$formateurC = new formateurC();
$formateurC->deleteformateur($_GET["idformateur"]);
header('Location:ListFormateur.php');
