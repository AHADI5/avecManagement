<?php 
include("../../configurations/config.php");
include("../../models/avecMembres.php");

if (AvecMembres ::deleteMemberFromAvec(3)) {
    echo "Successful";
} else {
    echo "failed";
}