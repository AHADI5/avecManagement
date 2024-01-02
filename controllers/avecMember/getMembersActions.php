<?php 
include("C:\laragon\www\avecManagement\configurations\config.php");
include("C:\laragon\www\avecManagement\models\avecMembres.php");

if (isset($_POST['id_avec'])) {
    $id_avec = $_POST['id_avec'];
    $membresAvec = AvecMembres:: getavecMembers($id_avec);
    
    for ($i=0; $i <count($membresAvec); $i++) { 
        $numero = $membresAvec[$i]['id_membre'];
        $nom = $membresAvec[$i]['nom'];
        $postnom = $membresAvec[$i]['postnom'];
        $adresse = $membresAvec[$i]['adresse'];
        $telephone = $membresAvec[$i]['telephone'];
        echo <<< __END
            <tr>
                <td  class = "num">$numero</td>
                <td>$nom</td>
                <td>$postnom</td>
                <td>$adresse</td>
                <td class = "cell-dell"><button class= "deleteMem">Retirer</button></td>
            </tr>
        __END;
    }

}


