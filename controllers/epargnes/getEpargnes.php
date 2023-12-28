<?php 
include("../../configurations/config.php");
include("../../models/Epargnes.php");

$epargnes = Epargnes::getEpargnes();
for ($i=0; $i < count($epargnes) ; $i++) { 

    $nom  = $epargnes[$i]['nom'];
    $postnom = $epargnes[$i]['postnom'];
    $montant = $epargnes[$i]['montant'];
    $parts = $epargnes[$i]['parts'];
    $date = $epargnes[$i] ['date'];
    echo <<< __END
        <tr>
           
            <td>$nom</td>
            <td>$postnom</td>
            <td>$montant USD</td>
            <td>$parts</td>
            <td>$date</td>
            
        </tr>
    __END;
    
}
