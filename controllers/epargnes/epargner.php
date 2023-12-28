<?php 
include("../../configurations/config.php");
include("../../models/Epargnes.php");

if (isset($_POST["montant"]) && isset($_POST["idAvec"]) &&
    isset($_POST["idMembres"]) && isset($_POST["montant"]) 
    && isset($_POST["date"])) {
    
    $montant = $_POST["montant"];
    $idAvec = $_POST["idAvec"];
    $membre = $_POST["idMembres"];
    $montant = $_POST["montant"];
    $date = $_POST["date"];
    $parts = $_POST["parts"];

    $epargne = new Epargnes($membre,$idAvec,$montant,$date,$parts);
    
    if ($epargne -> eparnger()) {
        echo "Success";
    } else {
        echo "Failed";
    }

}
