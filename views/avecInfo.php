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
                <div class="page-level">#<span class="id" id="<?php echo $id ?>"><?php echo $id ?></span> </div>
                <div class="action-text flex">
                    <div class="text">Lorem ipsum dolor sit amet.</div>
                    <div class="actions">
                        <div class="action"> 
                           <a href="./ajouterDansAvec.php?idAvec=<?php echo $id ?>"><button class = "new-member"> <i class = "bi bi-plus"></i>Ajouter des Membres</button></a>
                         </div>
                        <div class="action"></div>
                    </div>
                </div>
                <div class="informations-avec">
                   
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
                   
                  
                       
                    </tbody>
                </table>
                   
                </div>
            
            </div>
        </div>
       
    </div>
    <script src="../script/getAvecById.js"></script>
</body>
</html>