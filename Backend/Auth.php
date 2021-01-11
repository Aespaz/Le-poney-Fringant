<?php
function signin() {
    header('Content-Type: application/json');

    // Vérification de la bonne structure de la requête
    if(empty($_POST['login']) || empty($_POST['password'])) {
        http_response_code(400);
        echo(json_encode([
            'status' => 'error', 
            'message' => 'Les informations fournies ne sont pas suffisantes pour répondre à la demande', 
            ]));
        exit;
    }
    $login = $_POST['formMail'];
    $password = $_POST['formMDP'];

    if(true) {
        http_response_code(200);
        $_SESSION['connected'] = true;
        $_SESSION['user'] = $login;
        // Retour d'un JSON indiquant à l'utilisateur que ça marche !
        echo(json_encode([
            'status' => 'success',
            'message' => 'Connexion réussie, bienvenue !',
            'token' => 'erklghlsighesilrgh',
        ]));
    }
    // S'ils ne le sont pas :
    else {
        http_response_code(401);
        echo(json_encode([
            'status' => 'error', 
            'message' => 'Identifiant ou mot de passe incorrect', 
            ]));
    }
}
