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
                <div class="page-level">Avec</div>
                <div class="action-text flex">
                    <div class="text">Lorem ipsum dolor sit amet.</div>
                    <div class="actions">
                        <div class="action"> 
                           <a href="./ajouterAvec.php"><button class = "new-avec"> <i class = "bi bi-plus"></i>Ajouter</button></a>
                         </div>
                        <div class="action"></div>
                    </div>
                </div>
                
                <div class="avec-list grid">
                    <?php
                    include("../controllers/avec/getAvec.php"); 
                    for ($i=0; $i < count($avecs) ; $i++) { 
                        $numero = $avecs[$i] -> getId();
                        $dateDebut = explode(" ", $avecs[$i] -> getdateDebut())[0];
                        $dateFin = explode(" ", $avecs[$i] -> getdateFin())[0];
                        $solde = $avecs[$i] -> getSolde();
                        $partValue = $avecs[$i] -> getPartValue();
                        $tauxInteret = $avecs[$i] -> getTauxInteret();
                        $socialValue = $avecs[$i] -> getSocialValue();
                        $codeAvec = "#" . explode("-",$dateDebut)[2]. "-" .explode("-",$dateFin)[1];

                        echo <<< __END

                            <div class="avec-content">
                                <div class="avec" id = "$numero">
                                    <div class="number-code flex">
                                        <div class="number-id flex"> <div class="id">$numero</div> </div>
                                        <div class="code">$codeAvec</div>
                                    </div>
                                    <div class="solde flex"><i class = "bi bi-wallet"></i> <div class="amount">$solde $</div> </div>
                                    <div class="avec-brief-info">
                                        <div class="created flex flex"><i class = "bi bi-calendar"></i>  <div class="on">$dateDebut</div> <div class="to">$dateFin</div></div>
                                        <div class="members"><i class = "bi bi-people"></i> 30</div>
                                    </div>

                                    <div class="status">En cours</div>
                                </div>
                            </div>
       
                                   
                        __END;
                      
                        
                    }
                    ?>

                             
                </div>
            
            </div>
        </div>
       
    </div>

    <script src="../script/getAvecInfo.js"></script>
</body>
</html>