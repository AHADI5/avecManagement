<?php
include("../../configurations/config.php");
include("../../models/Credits.php");

$emprunts = Credits::emprunts();
for ($i=0; $i < count($emprunts) ; $i++) { 

    $nom  = $emprunts[$i]['nom'];
    $postnom = $emprunts[$i]['postnom'];
    $montant = $emprunts[$i]['montant'];
    $date = $emprunts[$i] ['date_credit'];

    echo <<< __END
        <tr>
           
            <td>$nom</td>
            <td>$postnom</td>
            <td>$montant USD</td>
            <td>$date</td>
            
        </tr>
    __END;


    
    
}