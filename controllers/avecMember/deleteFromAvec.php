<?php 
include("../../configurations/config.php");
include("../../models/avecMembres.php");

$id_member = $_POST['id_member'];
if (AvecMembres ::deleteMemberFromAvec($id_member)) {
    echo "Deleted";
} else {
    echo "Failed";
}