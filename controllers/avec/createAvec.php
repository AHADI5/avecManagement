<?php 
include("../../configurations/config.php");
include("../../models/Avec.php");



    $dateDebut = $_POST['date_debut'];
    $dateFin = $_POST['date_fin'];
    $solde = 0;
    $partValue = $_POST['part_value'];
    $tauxInteret = $_POST['tau_interet'];
    $social_value = $_POST['social_value'];

    //Creating new AVEC 

    $avec = new Avec($dateDebut,$dateFin,$solde,$partValue,
    $tauxInteret,$social_value);

    if ($avec -> registerAvec()) {
        header('Location:../../views/avec.php');
    } else {
        echo 'Failed';
    }

