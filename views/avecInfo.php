<?php 
$numero = $_GET['numero'];
$dateDebut = $_GET['dateDebut'];
$dateFin = $_GET['dateFin'];
$solde = $_GET['solde'];
$partValue = $_GET['partVal'];
$tauxInteret = $_GET['tauxInt'];
$social_value = $_GET['social'];
$code = "#" . explode("-",$dateDebut)[2]. "-" .explode("-",$dateFin)[1];
;
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
    <title>Home</title>
</head>
<?php
  include("../controllers/avec/getAvec.php"); 
?>
<body>
   <div class="page_content flex">
        <div class="menu"> <?php include("./include/menu.php") ?></div>
        <div class="content">
            <div class="title-bar">
                <?php include("./include/titlePage.php") ?>
            </div>
            <div class="conts">
                <div class="page-level"><?php echo $code ?></div>
                <div class="action-text flex">
                    <div class="text">Lorem ipsum dolor sit amet.</div>
                    <div class="actions">
                        <div class="action"> 
                           <a href="./ajouterDansAvec.php?idAvec=<?php echo $numero ?>"><button class = "new-member"> <i class = "bi bi-plus"></i>Ajouter des Membres</button></a>
                         </div>
                        <div class="action"></div>
                    </div>
                </div>
                <div class="informations-avec">
                    <div class="dates flex">
                        <div class="debut">
                            <div class="label">Debut</div>
                            <div class="value"><?php echo $dateDebut ?></div>
                        </div>
                        <div class="fin">
                            <div class="label">Fin</div>
                            <div class="value"> <?php echo  $dateFin ?></div>
                        </div>
                        <div class="social"> 
                            <div class="label"> Social </div>
                            <div class="value"><?php echo $social_value ?> CDF</div></div>
                        <div class="parts">
                            <div class="label">Parts </div>
                            <div class="value"><?php echo $partValue ?> USD</div>
                        </div>
                        <div class="taux">
                            <div class="label">Interet</div> 
                            <div class="value">  <?php echo $tauxInteret ?> %</div>
                        </div>

                    </div>
                </div>
                <div class="avec-list grid">
                
                    <table>
                    <thead>
                        <th>Numero</th>
                        <th>Nom</th>
                        <th>Postnom</th>
                        <th>Adresse</th>
                        <th>Telephone</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                    <?php
                   include("../controllers/avecMember/getMembers.php"); 
                   $membresAvec = AvecMembres::getavecMembers($numero);
                   for ($i=0; $i < count($membresAvec) ; $i++) { 
                    $numero = $membresAvec[$i]["id_membre"];
                    $nom = $membresAvec[$i]["nom"];
                    $postnom = $membresAvec[$i]["postnom"];
                    $adresse = $membresAvec[$i] ["adresse"];
                    $telephone = $membresAvec[$i]["telephone"];
                    echo <<< __END

                        <tr>
                            <td>$numero</td>
                            <td>$nom</td>
                            <td>$postnom</td>
                            <td>$adresse</td>
                            <td>$telephone</td>
                            <td></td>
                        </tr>
                    __END;
                   }
                   
            
                    ?>
                       
                    </tbody>
                </table>
                   
                </div>
            
            </div>
        </div>
       
    </div>
    
</body>
</html>