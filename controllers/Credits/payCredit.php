<?php
include("../../configurations/config.php");
include("../../models/Credits.php");
$idMembre = $_POST['id_membre'];
$idAvec = $_POST['id_avec'];
$montant = $_POST['montant'];

$payCredit = Credits::payCredit($idMembre,$idAvec,$montant);
$updatedAmount = Credits::getUpdatedCredit($idAvec,$idMembre);
if ($payCredit) {
    echo json_encode(array("Success" => true,"Montant" => $updatedAmount));
} else {
    echo json_encode(array("Failed" => false));
}

