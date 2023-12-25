<?php 
 
include("../../configurations/config.php");
include("../../models/Remboursement.php");

$idmembre = $_POST["idMembre"];
$idCredit = $_POST["idCredit"];
$idAvec = $_POST["idAvec"];
$dateRemb = $_POST["dateRemboursement"];
$amount = $_POST["amount"];

$remb = new Remboursement($idmembre, $idCredit, $idAvec,$dateRemb,$amount);
if ($remb -> giveBack()) {
   echo "Remboursement Reussi";
} else {
    echo "Failed";
}
