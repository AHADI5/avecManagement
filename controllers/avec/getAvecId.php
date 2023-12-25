<?php 
include("../../configurations/config.php");
include("../../models/Avec.php");

$avec = Avec::getAvecById(1);
print_r($avec);