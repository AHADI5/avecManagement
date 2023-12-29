<?php 
include("../../configurations/config.php");
include("../../models/Credits.php");
$id_avec = $_POST['id_avec'];
$emprunts = Credits::getCreditByIdavec($id_avec);

for ($i=0; $i <count($emprunts); $i++) { 
    $idCredit = $emprunts[$i]['id_remb'];
    $montantCredit = $emprunts[$i]['montant'];
    $numero = $emprunts[$i]['id_membre'];
    $nom = $emprunts[$i]['nom'];
    $postnom = $emprunts[$i]['postnom'];
    $adresse = $emprunts[$i]['adresse'];
    $telephone = $emprunts[$i]['telephone'];
    echo <<< __END
        <tr>
            <td class ="num" id = "$numero">$numero</td>
            <td class ="creditNumber" id = "$idCredit">$montantCredit USD</td>
            <td>$nom</td>
            <td>$postnom</td>
            <td> <input type="number" name="montant" id="montant" ></td>

            <td id="$numero" class = "giveBack"><button  class= "giveBackButton">Rembourser</button></td>
        </tr>
    __END;
}   