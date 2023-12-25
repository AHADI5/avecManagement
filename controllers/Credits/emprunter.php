<?php
include("../../configurations/config.php");
include("../../models/Credits.php");

$dateCredit = $_POST['dateCredit'];
$deadline= $_POST['deadline'];
$idMember = $_POST['idMembre'];
$idAvec = $_POST['idAvec'];
$montant = $_POST['montant'];

$credit = new Credits($dateCredit, $deadline,  
$idMember, $idAvec, $montant);

if ($credit ->emprunter()) {
   echo 'Emprunt';
} else {
    echo 'Operation Failed';
}