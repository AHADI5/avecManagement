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

<body>
   <div class="page_content flex">
        <div class="menu"> <?php include("./include/menu.php") ?></div>
        <div class="content">
            <div class="title-bar">
                <?php include("./include/titlePage.php") ?>
            </div>
            <div class="conts">
                <div class="page-level">Membres</div>
                <div class="action-text flex">
                    <div class="text">Lorem ipsum dolor sit amet.</div>
                    <div class="actions">
                        <div class="action"> 
                           <a href="./ajouterMembres.php"><button class = "new-avec"> <i class = "bi bi-plus"></i>Ajouter</button></a>
                         </div>
                        <div class="action"></div>
                    </div>
                </div>
                <div class="avec-list grid">
           
                   
                </div>
                <table>
                    <thead>
                        <th>Numero</th>
                        <th>Nom</th>
                        <th>Postnom</th>
                        <th>Adresse</th>
                        <th>Telephone</th>
                    </thead>
                    <tbody>
                    <?php
                        include("../controllers/membres/getMembre.php"); 
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
                                    <td>$telephone</td>
                                </tr>
                            __END;
                        
                            
                        }
                        ?>
                       
                    </tbody>
                </table>
            
            </div>
        </div>
       
    </div>
    
</body>
</html>