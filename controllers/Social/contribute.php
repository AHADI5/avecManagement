<?php 
 
include("../../configurations/config.php");
include("../../models/Social.php");

$idmembre = $_POST["idMembre"];
$idAvec = $_POST["idAvec"];
$dateSocial = $_POST["dateSocial"];
$amount = $_POST["amount"];

$social = new Social($idmembre, $idAvec, $dateSocial, $amount);

if ($social -> paySocial()) {
    echo "Payed";
} else {
    echo "Not yet Payed";
}