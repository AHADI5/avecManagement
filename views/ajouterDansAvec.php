<?php session_start()?>
<?php
$idavec = $_GET['idAvec']
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
    <link rel="stylesheet" href="../style/addForms.css">
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
                <div class="add-titile">Ajouter Avec</div>
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
                        include("../controllers/membres/getMembre.php"); 
                        for ($i=0; $i < count($membres) ; $i++) { 
                            $numero = $membres[$i] -> getId();
                            $nom = $membres[$i]-> getNom();
                            $postnom = $membres[$i] ->getPostnom();
                            $adresse = $membres[$i] -> getAdresse();
                            $telephone = $membres[$i] -> getTelephone();
                            echo <<< __END
                                <form action ="../controllers/avecMember/addMember.php" method ="post">
                                    <input name = "id_avec" type = "number" value = "$idavec" id = "idAvec">
                                    <tr>
                                        <td><input name = "id_member" type = "number" id = "id_member" value = "$numero" readonly></td>
                                        <td>$nom</td>
                                        <td>$postnom</td>
                                        <td>$adresse</td>
                                        <td>$telephone</td>
                                        <td><button type ="submit">Ajouter</button></td>
                                    </tr>
                                </form>
                            __END;
                        
                            
                        }
                        ?>
                       
                    </tbody>
                </table>
                
            </div>
        </div>
       
    </div>
    <script src="../script/deconnectAdmin.js"></script>
    
</body>
</html>