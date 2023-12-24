<?php 
     $username = 'root';
     $password = '';
     $host = 'localhost' ;
     $dbname = 'avec_db';
    try {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $db = new PDO("mysql:host={$host};dbname={$dbname}",
             $username, $password, $pdo_options);
    
        } catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }

    
    

