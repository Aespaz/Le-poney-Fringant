<?php 

    session_start(); 
    if(!empty($_SESSION['utilisateurs'])) {
        echo json_encode(["connected" => true, 'login' => $_SESSION['utilisateurs']]);
    } else {
        echo json_encode(["connected" => false]);
    }