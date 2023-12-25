<?php  
include("../../configurations/config.php");
include("../../models/Membres.php");

$membres = Membres::getMembreId(1);
var_dump($membres);