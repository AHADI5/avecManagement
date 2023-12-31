<?php 
include("../../configurations/config.php");
include("../../models/Avec.php");

$id = $_POST["id_avec"];
$amount = $_POST["montant"] ;

//updating Solde 
if (Avec::updateSolde($id,$amount)) {
    echo "Updated !";
} else {
    echo "Failed";
}