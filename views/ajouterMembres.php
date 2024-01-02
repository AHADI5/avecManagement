<?php session_start()?>
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
                <div class="add-titile">Ajouter Un membre</div>
                <div class="add-form flex">
                    <form action="../controllers/membres/createMember.php" method="post">
                        <div class="info">
                             <input type="text" name="nom" id="nom" placeholder = "Nom">
                        </div>
                        <div class="info">
                            <input type="text" name="postnom" id="postnom" placeholder = "Postnom">
                        </div>
                        <div class="info">
                            <input type="text" name="adresse" id="adresse" placeholder="Adresse">
                        </div>
                        <div class="info">
                            <input type="tel" name="telephone" id="telephone" placeholder = "Telephone">
                        </div>
                        <div class="info">
                            <button type="submit">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
       
    </div>
    <script src="../script/deconnectAdmin.js"></script>
    
</body>
</html>