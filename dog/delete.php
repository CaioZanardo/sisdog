<?php  
	require("../_config/connection.php");
    require("../dao/dog.php");
    $dogDAO = new Dog();
    $error = false;

    if(!$_GET || !$_GET["id"]){
        header('Location: index.php?message=Id da dog não informado!');
        die();
    }

    $idDog = $_GET["id"];

    try {
        $result = $dogDAO->delete($idDog);
    } catch (Exception $e) {
        $error = $e->getMessage();
    }

    $message = ($result && !$error) ? "dog excluida com sucesso." : "Erro ao excluir a dog.";
    header("Location: index.php?message=$message");
    die();

