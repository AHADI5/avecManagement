<?php
 $id = $_GET["id"];
 $part_value =$_GET["part"];
 $social = $_GET["social"]

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
                <div class="page-level1"><span class="part" id="<?php echo $part_value ?>" ><?php echo $part_value ?> USD une part</span> </div>
                <div class="page-level1"><span class="social" id="<?php echo $social ?>" ><?php echo $social ?> CDF social</span> </div>
                <div class="page-level1 date-zone"></div>

                <div class="action-text flex">
                    <div class="text">Lorem ipsum dolor sit amet.</div>
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
                   <th>Parts</th>
                   <th>Social</th>

                
                  
               </thead>
               <tbody class=".membres-list">
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
                            <td class ="num" id = "$numero">$numero</td>
                            <td>$nom</td>
                            <td>$postnom</td>
                            <td><input type="number" name="parts" id="parts"> </td>
                            <td> <input type="number" name="social" id="social" value = $social></td>
                            
                            <td class = "enregistrer"><button class= "enregistrerButton">Enregistrer</button></td>
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
   
    <script src="../script/epargner.js"></script>
    <script src ="../script/addMembers.js"></script>
</body>
</html>