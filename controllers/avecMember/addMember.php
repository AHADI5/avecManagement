<?php 
include("../../configurations/config.php");
include("../../models/avecMembres.php");

if (isset($_POST["id_avec"]) && isset($_POST["id_member"])) {
    $id_avec = $_POST["id_avec"];
    $id_member = $_POST["id_member"];
    /**
     * Checking Wether Member Exists in Selected Avec
     */
    if (AvecMembres::checkMemberAve($id_member,$id_avec)) {
        echo json_encode(array("Exists" => true));
    } else {
        
        $avecList = new AvecMembres($id_member, $id_avec);
        if ($avecList ->addMememberToAvec()) {
            echo json_encode(array("Success" , true));
         } else {
             echo json_encode(array("Failure" , false));
         }
        
    }

} else {
    echo json_encode(array("Message" => "No data Selected"));
}

