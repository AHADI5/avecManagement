<?php
include("../../configurations/config.php");
include("../../models/Epargnes.php");
$id_avec = $_POST['id_avec'];
$id_membre = $_POST['id_membre'];

$avecEpargene = Epargnes::getEpargneByAvec($id_avec,$id_membre);
$date = [];
for ($i=0; $i < count($avecEpargene) ; $i++) { 
   array_push($date,explode(" ",$avecEpargene[$i]['date'])[0]);
}
echo json_encode($date);
