<?php 
include("../../configurations/config.php");
include("../../models/avecMembres.php");

$membresAvec = AvecMembres::getavecMembers(1);
var_dump($membresAvec);