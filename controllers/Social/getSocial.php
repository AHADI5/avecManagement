<?php 
include("../../configurations/config.php");
include("../../models/Social.php");

$social = Social::getSocial();
for ($i=0; $i < count($social) ; $i++) { 

    $nom  = $social[$i]['nom'];
    $postnom = $social[$i]['postnom'];
    $montant = $social[$i]['montant'];
    $date = $social[$i] ['date_social'];
    echo <<< __END
        <tr>
           
            <td>$nom</td>
            <td>$postnom</td>
            <td>$montant CDF</td>
            <td>$date</td>
            
        </tr>
    __END;
    
}