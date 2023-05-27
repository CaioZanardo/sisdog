<?php
require("../_config/connection.php");
require("../dao/raca.php");
$racaDAO = new Raca();
$error = false;

if (!$_GET || !$_GET["id"]) {
    header('Location: index.php?message=Id da raça não informada!');
    die();
}

$idraca = $_GET["id"];

try {
    $result = $racaDAO->delete($idraca);
  
} catch (Exception $e) {
    $error = $e->getMessage();
}

$message = ($result && !$error) ? "Raça excluida com sucesso." : "Erro ao excluir a Raça.";
header("Location: index.php?message=$message");
die();
