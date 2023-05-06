<?php
include '../Controller/AssistantC.php';
$assistantC = new assistantC();
$assistantC->deleteassistant($_GET["idassistant"]);
header('Location:ListAssistant.php');
