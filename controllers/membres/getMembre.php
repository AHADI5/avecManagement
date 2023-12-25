<?php  
include("../../configurations/config.php");
include("../../models/Membres.php");

$membres = Membres::getMembres();
var_dump($membres);