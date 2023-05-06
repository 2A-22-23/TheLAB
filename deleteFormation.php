<?php
include '../Controller/FormationC.php';
$formationC = new formationC();
$formationC->deleteformation($_GET["idformation"]);
header('Location:ListFormation.php');
