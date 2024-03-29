<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/menu.css">
    <link rel="stylesheet" href="../style/title-bar.css">
    <link rel="stylesheet" href="../style/homePageStyle.css">
    <title>Home</title>
</head>
<body>
   <div class="page_content flex">
        <div class="menu"> <?php include("./include/menu.php") ?></div>
        <div class="content">
            <div class="title-bar">
                <?php include("./include/titlePage.php") ?>
            </div>
            <div class="conts grid">
                <div class="graph_credits">
                    
                    <div class="graph flex">
                        <div class="title-graph">Revenus Mensuel</div>
                        <div class="graph-content ">
                             <canvas id="myChart"></canvas>
                        </div>
                    </div>
                    <div class="recents flex">
                        <div class="credits">
                            <div class="title flex"> 
                                <div class="icon-recent"><img src="../imgs/recentCredits.png" alt=""></div> 
                                <div class="text-title">Recent Credits</div>
                            </div>
                            <div class="recent-credits-content">
                                

                            </div>

                        </div>
                        <div class="saves">
                             <div class="title flex"> 
                                <div class="icon-recent"><img src="../imgs/save-money.png" alt=""></div> 
                                <div class="text-title">Recent Savings</div>
                            </div>
                            <div class="recent-savings-content">
                                

                            </div>
                        </div>
                        

                    </div>
                    
                </div>
                <div class="total-saved">
                    <div class="section-title">Total </div>
                    <div class="section-content">
                        <div class="saved element">
                            <div class="title-cont">Total Saved</div>
                            <div class="amount">5000$</div>
                        </div>
                        <div class="credit-granted element">
                            <div class="title-cont">Credit Granted</div>
                            <div class="amount">6000$</div>
                        </div>
                     
                        <div class="social element">
                            <div class="title-cont">Total social</div>
                            <div class="social_amount">6000$</div>
                        </div>
                        <div class="members-chart flex">
                            <div class="graph-cont">
                                <canvas id="gender-chart"></canvas>
                            </div>
                        </div>
                    </div>
                   

                </div>
            </div>
        </div>
       
    </div>
    <script src="../script/deconnectAdmin.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../script/homeCharts.js"></script>
    <script src="../script/activeLink.js"></script>
    
    
</body>
</html>