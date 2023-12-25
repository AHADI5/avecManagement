<?php 
include("../../configurations/config.php");
include("../../models/Membres.php");

if (isset($_POST["nom"]) && isset($_POST['postnom']) 
&& isset($_POST['adresse']) && isset($_POST['telephone'])) {
    $nom = $_POST['nom'];
    $postnom = $_POST['postnom'];
    $adresse = $_POST['adresse'];
    $telephone = $_POST['telephone'];
    $idMember = $_POST['id'];

   
    if (Membres::updateMembre($idMember,$nom, $postnom, $adresse, $telephone)) {
        echo 'Success';
    } else {
        echo "Didn't Update";
    }
   
} else {
    echo 'no data';
}