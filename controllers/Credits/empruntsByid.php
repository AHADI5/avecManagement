<?php 
include("../../configurations/config.php");
include("../../models/Credits.php");

$emprunts = Credits::getEmpruntsbyMembres($id_member);
