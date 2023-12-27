<?php 
include("../../configurations/config.php");
include("../../models/Avec.php");
//getting Id 


$id = $_POST["id_avec"];
$avec = Avec::getAvecById($id);
$dateDebut = $avec['date_debut'];
$dateFin = $avec['date_fin'];
$social_value = $avec  ['social_value'];
$partValue = $avec['part_value'];
$tauxInteret = $avec ['taux_interet'];
echo <<< _END
<div class="dates flex">
<div class="debut">
    <div class="label">Debut</div>
    <div class="value"> $dateDebut </div>
</div>
<div class="fin">
    <div class="label">Fin</div>
    <div class="value"> $dateFin </div>
</div>
<div class="social"> 
    <div class="label"> Social </div>
    <div class="value">$social_value CDF</div></div>
<div class="parts">
    <div class="label">Parts </div>
    <div class="value">$partValue USD</div>
</div>
<div class="taux">
    <div class="label">Interet</div> 
    <div class="value">   $tauxInteret  %</div>
</div>

</div>

_END ;