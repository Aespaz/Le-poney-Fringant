<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
include('config.php'); //ont inclut la BDD
if (isset($_POST['email'])) {
    $mail = $_POST['email'];// recuperation du contenu du formulaire mail
}
if (isset($_POST['password'])){
    $password = $_POST['password'];//recuperation du contenu du formulaire mot de passe
}

$req = "SELECT pseudo, email, password FROM utilisateurs WHERE email = :email LIMIT 1";//req qui vas aller chercher le mot de passe dans la table utilisateurs pour 1 mail.





$connexion = new PDO('mysql:host=localhost;  dbname=LEPONEYFRINGANT', 'poney', 'fringant');// connexion à la base de donné LEPONEYFRINGANT 
$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//

try {
    $statement = $connexion->prepare($req);//préparation de la requette
    $statement->bindParam(':email', $mail);
    $statement->execute();
    $resultat = $statement->fetch(PDO::FETCH_ASSOC);//rechercher le mot de passe dans la variable resultat 
    $pseudoBdd = $resultat['pseudo'];//le formulaire du pseudo est bind de manier a pouvoir identifier la ligne dans le tableau utilisateurs dans la BDD
    $mailBdd = $resultat['email'];//même explication que celui d'en haut
    $passwordBdd = $resultat['password'];

    
} catch(Exception $exception) {//attraper une exception de maniere a voir les erreurs 
        //echo $exception->getMessage();
    }
    if($password == $passwordBdd) { //si le mot de passe saisie par l'utilisateur est égale au mot de passe de son addresse mail en basse de donné alors il se connecte
        session_start(); //demarage de la session ^^
        $_SESSION['utilisateurs'] = $mail; 

        http_response_code(200);// le code que tout le monde veut avoir ^^  
       // header('location:../membres.html');
        // header('Access-Control-Expose-Headers: Location');
       
        echo json_encode(["connected" => true]);//ont est connecter cool XD
       //exit();
    } else {
        http_response_code(401); // Non autorisé car le mot de passe n'est pas le même de celui qui est en BDD
        echo json_encode(["connected" => false]);//ont est pas connecter est ça recharge la page
     }
    


    ?>