<?php 
include("../../configurations/config.php");
include("../../models/Avec.php");

$id = $_POST["id_avec"];
$avec = Avec::getAvecById($id);

if ($avec != null) {
    echo "window.location.href = '../views/avecInfo.php?id=$id';";
    exit();
}