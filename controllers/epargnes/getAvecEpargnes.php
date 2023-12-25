<?php
include("../../configurations/config.php");
include("../../models/Epargnes.php");

$avecEpargene = Epargnes::getEpargneByAvec(1);
var_dump($avecEpargene);
