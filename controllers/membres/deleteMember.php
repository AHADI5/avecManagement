<?php 
include("../../configurations/config.php");
include("../../models/Membres.php");

if (Membres::deleteMembre(1)) {
    echo "Deleted";
} else {
    echo "Failed";
}