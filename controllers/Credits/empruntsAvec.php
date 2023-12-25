<?php 
include("../../configurations/config.php");
include("../../models/Credits.php");

$emprunts = Credits::getCreditByIdavec($id);
