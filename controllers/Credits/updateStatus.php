<?php
include("../../configurations/config.php");
include("../../models/Credits.php");

$id_avec = $_POST['id_avec'];
$id_member = $_POST['id_member'];
var_dump(Credits::updateStatusCredit( $id_avec, $id_member ,"hhh"));