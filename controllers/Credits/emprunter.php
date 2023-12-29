<?php
include("../../configurations/config.php");
include("../../models/Credits.php");

$dateCredit = $_POST['dateCredit'];
$idMember = $_POST['idMembre'];
$idAvec = $_POST['idAvec'];
$montant = $_POST['montant'];

$credit = new Credits($dateCredit,  
$idMember, $idAvec, $montant);

if ($credit ->emprunter()) {
   echo 'Emprunt';
} else {
    echo 'Failed';
}