<?php  
require_once('C:\laragon\www\avecManagement\configurations\config.php');
require_once('../../models/avecMembres.php');

$idsMember = AvecMembres::getIdsMembers(2);
echo json_encode($idsMember);