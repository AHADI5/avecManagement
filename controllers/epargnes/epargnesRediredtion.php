<?php 
include("../../configurations/config.php");
include("../../models/Avec.php");

$id = $_POST["id_avec"];
$avec = Avec::getAvecById($id);
$partsValue = $avec['part_value'];
$social = $avec['social_value'];

if ($avec != null) {
    echo "window.location.href = '../views/epargnes.php?id=$id&part=$partsValue&social=$social';";
    exit();
}