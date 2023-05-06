<?php
include '../Controller/ProblemeC.php';
$problemeC = new problemeC();
$problemeC->deleteprobleme($_GET["idprobleme"]);
header('Location:ListProbleme.php');
