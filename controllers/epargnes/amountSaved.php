<?php 
include("../../configurations/config.php");
include("../../models/Epargnes.php");

$idMember = $_POST['idMember'];
$amount = Epargnes::getSavedMoney($idMember);
echo $amount;