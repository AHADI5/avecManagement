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
                <div class="add-titile">Ajouter Avec</div>
                <div class="add-form flex">
                    <form action="../controllers/avec/createAvec.php" method="post">
                        <div class="info">
                             <input type="date" name="date_debut" id="dateDebut">
                        </div>
                        <div class="info">
                            <input type="date" name="date_fin" id="datefin">
                        </div>
                        <div class="info">
                            <input type="number" name="part_value" id="partValue" placeholder="Nombre des parts max">
                        </div>
                        <div class="info">
                            <input type="number" name="tau_interet" id="tau_interet" placeholder = "Taux Interet">
                        </div>
                        <div class="info">
                            <input type="number" name="social_value" id="social_value"placeholder ="Social">
                        </div>
                        <div class="info">
                            <button type="submit">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
       
    </div>
    
</body>
</html>