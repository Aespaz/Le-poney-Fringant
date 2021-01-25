<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
include('config.php'); //ont inclut la BDD

$req = "SELECT pseudo, prenom, created_at FROM utilisateurs";//req qui vas aller chercher le mot de passe dans la table utilisateurs pour 1 mail.





$connexion = new PDO('mysql:host=localhost;dbname=LEPONEYFRINGANT', 'poney', 'fringant');// connexion à la base de donné LEPONEYFRINGANT 
$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//

try {
    $statement = $connexion->prepare($req);//préparation de la requette
    $statement->execute();
    $resultat = $statement->fetchAll(PDO::FETCH_ASSOC);

    
} catch(Exception $exception) {//attraper une exception de maniere a voir les erreurs 
        echo $exception->getMessage();
}
echo json_encode($resultat);
    ?>