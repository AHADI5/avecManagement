<?php 
include("../../configurations/config.php");
include("../../models/Avec.php");

$avecs = Avec::getAvec();
print_r($avecs);