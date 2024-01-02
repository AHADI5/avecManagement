<?php 
include("../../configurations/config.php");
include("../../models/Membres.php");

$id_member = $_POST['id_member'];
if (Membres::deleteMembre($id_member)) {
    echo "Deleted";
} else {
    echo "Failed";
}