<?php 
include("../../configurations/config.php");
include("../../models/authentification.php");

$username = $_POST['username'];
$password = $_POST['password'];

// if (authentification::login($username, $password) != null) {
//     echo "Logged in";
// } else {
//     echo "Failed";
// }

if (authentification::login($username, $password)) {
    header('Location:../../views/homePage.php');
} else {
    header('Location:../../views/login.php');
}
