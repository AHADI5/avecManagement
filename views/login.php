<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/login.css">
    <title>Document</title>
</head>
<body>
    <div class="login-main grid">
        <div class="login-form flex">
           <div class="form-admin ">
                <div class="header-login">
                    <div class="title">Login</div>
                    <div class="text">Enter Account Details</div>
                </div>
                <div class="form-content">
                    <form action="../controllers/login/connectAdmin.php" method="post">
                        <div class="login-info">
                            <div class="username"><input type="text" name="username" id="username" placeholder="Usename"></div>
                            <div class="password"><input type="password" name="password" id="password" placeholder = "Password"></div>
                        </div>
                        <div class="action-login">
                            <button type ="submit">Login</button>
                        </div>
                    </form>
                </div>
           </div>
        </div>
        <div class="picture flex">
            <img src="../imgs/icons8-verify-500.png" alt="">

        </div>
    </div>
</body>
</html>