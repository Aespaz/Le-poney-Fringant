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
if (isset($_POST['nom'])){
    $nom = $_POST['nom'];

}
if (isset($_POST['mail'])){
    $mail = $_POST['mail'];
}
if (isset($_POST['passeword'])){
    $passeword = PASSWORD_HASH($_POST['passeword'], PASSWORD_DEFAULT);
}
if (isset($_POST['numero'])){
    $numero = $_POST['numero'];
}
if (isset($_POST['adresse'])){
    $adresse = $_POST['adresse'];
}
if (isset($_POST['cp'])){
    $cp = $_POST['cp'];
}
if (isset($_POST['ville'])){
    $ville = $_POST['ville'];
}


$requette = "INSERT INTO utilisateurs (pseudo, prenom, nom, email, numero, adresse, cp, ville, password) VALUES (:pseudo, :prenom, :nom, :mail, :numero, :ville, :cp, :adresse, :passeword)";//req qui vas aller chercher le mot de passe dans la table utilisateurs pour 1 mail.





$connexion = new PDO('mysql:host=localhost;  dbname=LEPONEYFRINGANT', 'poney', 'fringant');// connexion à la base de donné LEPONEYFRINGANT 
$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//

try {
    $statement = $connexion->prepare($requette);
    $statement->bindParam(':mail', $mail);// lier le formulaire mail a la requette BDD
    $statement->bindParam(':pseudo', $pseudo);// lier le formulaire pseudo a la requette BDD
    $statement->bindParam(':prenom', $prenom);// lier le formulaire prenom a la requette BDD
    $statement->bindParam(':nom', $nom);// lier le formulaire nom a la requette BDD
    $statement->bindParam(':numero', $numero);// lier le formulaire tel pour le telephone a la requette BDD
    $statement->bindParam(':adresse', $adresse);// lier le formulaire adreesse a la requette BDD
    $statement->bindParam(':cp', $cp);// lier le formulaire du code postal a la requette BDD
    $statement->bindParam(':ville', $ville);// lier le formulaire de la ville a la requette BDD
    $mot_de_passe = $statement->bindParam(':passeword', $passeword);
    password_hash($mot_de_passe, PASSWORD_DEFAULT);
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