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
                <div class="page-level">Situation Generales</div>
                <div class="action-text flex">
                    <div class="text">Lorem ipsum dolor sit amet.</div>
                    <div class="actions">
                        <div class="action"> 
                           
                         </div>
                        <div class="action"></div>
                    </div>
                </div>
                <div class="avec-list grid">
           
                   
                </div>
                <table>
                    <thead>
                        <th>Nom</th>
                        <th>Postnom</th>
                        <th>Montant</th>
                        <th>Parts</th>
                        <th>Date</th>
                    </thead>
                    <tbody class="liste-epargnes-all">
            
                       
                    </tbody>
                </table>
            
            </div>
        </div>
       
    </div>

    <script src="../script/getEpargnes.js"></script>
    
</body>
</html>