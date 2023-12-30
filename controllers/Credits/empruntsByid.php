<?php 
include("../../configurations/config.php");
include("../../models/Credits.php");

$id_member = $_POST['id_membre'];
$emprunts = Credits::getEmpruntsbyMembres($id_member);

if ($emprunts == null) {
    echo json_encode(array("isEmpty" => true));
} else {
    echo json_encode(array(
        "isEmpty" => false, 
        "id_member" => $id_member , 
        "montant" => $emprunts[0]['montant']));
}
