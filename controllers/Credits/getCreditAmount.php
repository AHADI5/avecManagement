<?php 
include("../../configurations/config.php");
include("../../models/Credits.php");

$amount =  Credits::getCreditAmount(2,1);
echo json_encode($amount);