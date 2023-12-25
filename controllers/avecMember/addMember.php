<?php 
include("../../configurations/config.php");
include("../../models/avecMembres.php");

if (isset($_POST["id_avec"]) && isset($_POST["id_member"])) {
    $id_avec = $_POST["id_avec"];
    $id_member = $_POST["id_member"];

    $avecList = new AvecMembres($id_member, $id_avec);

    if ($avecList ->addMememberToAvec()) {
       echo "Added";
    } else {
        echo "Couldn't fullfil";
    }
}




