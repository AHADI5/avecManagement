<?php  
require_once('C:\laragon\www\avecManagement\configurations\config.php');
require_once('C:\laragon\www\avecManagement\models\Membres.php');

$membres = Membres::getMembres();
for ($i=0; $i < count($membres) ; $i++) { 
    $numero = $membres[$i] -> getId();
    $nom = $membres[$i]-> getNom();
    $postnom = $membres[$i] ->getPostnom();
    $adresse = $membres[$i] -> getAdresse();
    $telephone = $membres[$i] -> getTelephone();
    echo <<< __END
        <tr>
            <td>$numero</td>
            <td>$nom</td>
            <td>$postnom</td>
            <td>$adresse</td>
            <td><button class = "ajouterMembre">Ajouter</button></td>
        </tr>
    __END;
}