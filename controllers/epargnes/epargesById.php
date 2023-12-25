<?php 
include("../../configurations/config.php");
include("../../models/Epargnes.php");

$epargnes = Epargnes::getEpargneByIdmember(2);
var_dump($epargnes['nom']);