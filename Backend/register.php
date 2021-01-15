<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
include('config.php');
if (isset($_POST['pseudo'])){
    $pseudo = $_POST['pseudo'];
}
if (isset($_POST['prenom'])){
    $prenom = $_POST['prenom'];
}
if (isset($_POST['mail'])){
    $mail = $_POST['mail'];
}
if (isset($_POST['passeword'])){
    $passeword = $_POST['passeword'];
}



$requette = "INSERT INTO utilisateurs (pseudo, prenom, email, password) VALUES (:pseudo, :prenom, :mail, :passeword)";//req qui vas aller chercher le mot de passe dans la table utilisateurs pour 1 mail.





$connexion = new PDO('mysql:host=localhost;  dbname=LEPONEYFRINGANT', 'poney', 'fringant');// connexion à la base de donné LEPONEYFRINGANT 
$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//

try {
    $statement = $connexion->prepare($requette);
    $statement->bindParam(':mail', $mail);
    $statement->bindParam(':pseudo', $pseudo);
    $statement->bindParam(':prenom', $prenom);
    $statement->bindParam(':passeword', $passeword);
    $statement->execute();


    
    echo json_encode('{
        "statut": "ok",
        "description": "message bien enregistré dans la conversaion "}');
} catch(Exception $exception) {
echo $exception->getMessage();
    echo json_encode('{
        "statut": "error",
        "description": "insertion impossible dans la BDD "}');
    }

    ?>