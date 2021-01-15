<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
include('config.php');
if (isset($_POST['pseudo'])) {
    $pseudo = $_POST['pseudo'];
} 
if (isset($_POST['prenom'])) {
    $prenom = $_POST['prenom'];
}
if (isset($_POST['email'])) {
    $mail = $_POST['email'];
}
if (isset($_POST['password'])){
    $password = $_POST['password'];
}



$req = "INSERT INTO utilisateurs (pseudo, prenom, email, password) VALUE (:pseudo, :prenom, :email, :password)";//req qui vas aller chercher le mot de passe dans la table utilisateurs pour 1 mail.





$connexion = new PDO('mysql:host=localhost;  dbname=LEPONEYFRINGANT', 'poney', 'fringant');// connexion à la base de donné LEPONEYFRINGANT 
$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//

try {
    $statement = $connexion->prepare($req);
    $statement->bindParam(':email', $mail);
    $statement->bindParam(':pseudo', $pseudo);
    $statement->bindParam(':prenom', $prenom);
    $statement->execute();
    $resultat = $statement->fetch(PDO::FETCH_ASSOC);//rechercher le mot de passe dans la variable resultat 
    $pseudoBdd = $resultat['pseudo'];
    $mailBdd = $resultat['email'];
    $passwordBdd = $resultat['password'];

    
} catch(Exception $exception) {
        echo $exception->getMessage();
    }
   //si le mot de passe saisie par l'utilisateur est égale au mot de passe de son addresse mail en basse de donné alors il se connecte
        session_start(); //demarage de la session ^^ 
        
        http_response_code(200);// le code que tout le monde veut avoir ^^
        echo json_encode(["connected" => true]);

    ?>