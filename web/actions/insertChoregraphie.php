<?php
session_start();
$tokenServeur = $_SESSION['token'];
$tokenRecu = filter_input(INPUT_POST, 'token',FILTER_DEFAULT);

if ($tokenServeur != $tokenRecu){
    die("TOKEN ERROR");
}

$nom = filter_input(INPUT_POST, 'nom', FILTER_DEFAULT);
$chemin = filter_input(INPUT_POST, 'chemin', FILTER_DEFAULT);
$id_choregraphie = filter_input(INPUT_POST, 'id_choregraphie', FILTER_VALIDATE_INT);

$photo=$_FILES['son'];
move_uploaded_file($photo['tmp_name'],"../photos/".$photo['name']);
//on enregistre le chemin de la photo dans la BDD
$url_photo="Photos/".$photo['name'];


include "../config.php";
$pdo = new PDO("mysql:host=" . config::HOST . ";dbname=" . config::DBNAME, config::USER, config::PASSWORD);

//on prépare la requête avec des bindParam pour éviter les injections SQL
$req = $pdo->prepare("INSERT INTO chatons (nom,description,photo,id_categorie) VALUES (:nom,:description,:photo,:id_categorie)");
$req->bindParam(':nom', $nom);
$req->bindParam(':description', $description);
$req->bindParam(':photo', $url_photo);
$req->bindParam(':id_categorie', $id_categorie);

$req->execute();

//retour à la page d'accueil
header("Location: ../categorie.php?d=".$id_categorie);
?>