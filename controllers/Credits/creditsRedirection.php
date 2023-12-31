<?php 
include("../../configurations/config.php");
include("../../models/Avec.php");

$id = $_POST["id_avec"];
$avec = Avec::getAvecById($id);
$interestRate = $avec['taux_interet'] ;

if ($avec != null) {
    echo "window.location.href = '../views/credits.php?id=$id&taux=$interestRate'";
    exit();
}

