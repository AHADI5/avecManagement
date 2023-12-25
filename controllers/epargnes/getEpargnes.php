<?php 
include("../../configurations/config.php");
include("../../models/Epargnes.php");

$epargnes = Epargnes::getEpargnes();
var_dump($epargnes);