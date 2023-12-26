<?php 
include("../../configurations/config.php");
include("../../models/Membres.php");

if (isset($_POST["nom"]) && isset($_POST['postnom']) 
&& isset($_POST['adresse']) && isset($_POST['telephone'])) {
    $nom = $_POST['nom'];
    $postnom = $_POST['postnom'];
    $adresse = $_POST['adresse'];
    $telephone = $_POST['telephone'];

    $member = new Membres($nom,$postnom,$adresse,$telephone);
    if ($member -> createMember()) {
        header('Location:../../views/membres.php');
    } else {
        echo "Didn't create";
    }
   
} else {
    echo 'no data';
}