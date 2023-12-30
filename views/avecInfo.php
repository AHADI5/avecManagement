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
                <div class="action-text flex">
                    <div class="text">Lorem ipsum dolor sit amet.</div>
                    <div class="actions">
                        <div class="action flex"> 
                           <button class = "new-member"> <i class = "bi bi-plus"></i>Ajouter Membres</button>
                           <button class = "epargnes"> <i class = "bi bi-save"></i>Epargnes</button>
                           <button class = "credits"> <i class="bi bi-credit-card-2-back-fill"></i>Credits</button>
                           <button class = "rembourser"> <i class="bi bi-wallet-fill"></i></i>Rembourser</button>
                         </div>
                        <div class="action"></div>
                    </div>
                </div>
                <div class="informations-avec">
                   
                </div>
                <div class="avec-list grid">
           
                   
           </div>
           <table>
               <thead>
                   <th>Numero</th>
                   <th>Nom</th>
                   <th>Postnom</th>
                   <th>Adresse</th>
                   <th>Actions</th>
               </thead>
               <tbody class="membres-list">
                <?php
                 include("C:\laragon\www\avecManagement\configurations\config.php");
                 include("C:\laragon\www\avecManagement\models\avecMembres.php");

                 $membresAvec = AvecMembres::getavecMembers($id);
                 for ($i=0; $i <count($membresAvec); $i++) { 
                    $numero = $membresAvec[$i]['id_membre'];
                    $nom = $membresAvec[$i]['nom'];
                    $postnom = $membresAvec[$i]['postnom'];
                    $adresse = $membresAvec[$i]['adresse'];
                    $telephone = $membresAvec[$i]['telephone'];
                    echo <<< __END
                        <tr>
                            <td class ="num">$numero</td>
                            <td>$nom</td>
                            <td>$postnom</td>
                            <td>$adresse</td>
                            <td class = "cell-dell"><button class= "deleteMem">Retirer</button></td>
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
    <script src="../script/getAvecById.js"></script>
    <script src="../script/addMembers.js"></script>
    <script src="../script/retirerMember.js"></script>
    <script src="../script/epargnes.js"></script>
    <script src="../script/credits.js"></script>
    <script src="../script/remboursement.js"></script>
    
</body>
</html>