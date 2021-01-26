<?php 

    session_start(); //création de la session avec un cookie perssistant 
    if(!empty($_SESSION['utilisateurs'])) {
        echo json_encode(["connected" => true, 'email' => $_SESSION['utilisateurs'], 'pseudo' => $_SESSION['pseudo']]);// si c'est vrai cela demarre la session
    } else {
        echo json_encode(["connected" => false]);//si c'est faux ont est pas connecter
    }