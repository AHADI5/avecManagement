<?php session_start()?>
<?php
 $id = $_GET["id"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/menu.css">
    <link rel="stylesheet" href="../style/title-bar.css">
    <link rel="stylesheet" href="../style/avec.css">
    <link rel="stylesheet" href="../style/membres.css">
    <link rel="stylesheet" href="../style/popup.css">
    <link rel="stylesheet" href="../style/epargnes.css">
    <title>Home</title>
</head>
<?php
  include("../controllers/avec/getAvec.php"); 
?>
<body class="bodyOp">
   <div class="page_content flex">
        <div class="menu"> <?php include("./include/menu.php") ?></div>
        <div class="content">
            <div class="title-bar">
                <?php include("./include/titlePage.php") ?>
            </div>
            <div class="conts">
                <div class="page-level">#<span class="id" id="<?php echo $id ?>"><?php echo $id ?></span> </div>
                <div class="page-level1 date-zone"></div>

                <div class="action-text flex">
                    <div class="text">Lorem ipsum dolor sit amet.</div>
                    <div class="message hidden-message"></div>
                </div>
                <div class="informations-avec">
                   
                </div>
                <div class="avec-list grid">
           
                   
           </div>
           <table>
               <thead>
                   <th>Numero</th>
                   <th>Credit</th>
                   <th>Nom</th>
                   <th>Postnom</th>
                   <th>Montant</th>
                  
               </thead>
               <tbody class="">
                    <?php 
                    include("C:\laragon\www\avecManagement\configurations\config.php");
                    include("C:\laragon\www\avecManagement\models\Credits.php");
                    
                    $emprunts = Credits::getCreditByIdavec($id);

                    for ($i=0; $i <count($emprunts); $i++) { 
                        $idCredit = $emprunts[$i]['id_credit'];
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

                    ?>
                
               </tbody>
           </table>
           <div class="add-member  inactive_popup">
           <div class="add-member-popup ">
                <div class="popup-header flex">
                    <div class="popup-title">Ajouter Des membres</div>
                    <div class="close-button"> 
                        <button class="close-popup flex"> <span class="close-text">x</span> </button> 
                    </div>
                </div>
                <div class="pop-up-boy">
                    <div class="pop-content">
                        <table>
                            <thead>
                                <th>Numero</th>
                                <th>Nom</th>
                                <th>Postnom</th>
                                <th>Adresse</th>
                                <th>Action</th>
                            </thead>
                            <tbody class="membres">
                            

                                            
                            </tbody>
                           
                        </table>
                        <div class="actions flex"> 
                            <button>Save</button>
                            <button>Cancel</button>

                         </div>
                    </div>
                    
                </div>
           </div>
                
           </div>
       
       </div>
        </div>
       
    </div>

    <script src="../script/getCreditsAvec.js"></script> 
   <script src="../script/rembourser.js"></script>
   <script src="../script/deconnectAdmin.js"></script>
    
</body>
</html>