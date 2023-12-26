<?php  
require_once('C:\laragon\www\avecManagement\configurations\config.php');
require_once('C:\laragon\www\avecManagement\models\Membres.php');

$membres = Membres::getMembres();
