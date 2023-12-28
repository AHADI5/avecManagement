<?php 
include("../../configurations/config.php");
include("../../models/Avec.php");

$id = $_POST["id_avec"];
$avec = Avec::getAvecById($id);

if ($avec != null) {
    echo "window.location.href = '../views/epargnes.php?id=$id';";
    exit();
}