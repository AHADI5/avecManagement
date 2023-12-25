<?php
include("../../configurations/config.php");
include("../../models/Avec.php");
    $id = $_POST['id'];
    $dateDebut = $_POST['date_debut'];
    $dateFin = $_POST['date_fin'];
    // $solde = $_POST['solde'];
    $partValue = $_POST['part_value'];
    $tauxInteret = $_POST['tau_interet'];
    $social_value = $_POST['social_value'];

    if (Avec::modifyAvec($id, $dateDebut, $dateFin,
    $partValue, $tauxInteret,$social_value)) {
        echo 'success';
    }

