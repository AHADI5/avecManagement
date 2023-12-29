<?php
include("../../configurations/config.php");
include("../../models/Credits.php");
$idMembre = $_POST['id_membre'];
$idAvec = $_POST['id_avec'];
$montant = $_POST['montant'];

$payCredit = Credits::payCredit($idMembre,$idAvec,$montant);