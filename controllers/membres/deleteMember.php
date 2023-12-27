<?php 
include("../../configurations/config.php");
include("../../models/Membres.php");

$id_member = $_POST['id_member'];
if (Membres::deleteMembre(1)) {
    echo "Deleted";
} else {
    echo "Failed";
}