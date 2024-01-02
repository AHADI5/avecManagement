<?php
 class authentification 
{
    public static function login($userName,$password) {
        
        global $connection ;
        $requette = 'SELECT * FROM admin WHERE username = :ADMIN';
        $statement = $connection->prepare($requette);
        $execution = $statement->execute([
       ':ADMIN'=> $userName,
       ]) ;
       if ($execution) {
           $user = $statement->fetch(PDO::FETCH_ASSOC) ;
           
       }
       if ( $password === $user['PASSWORD']) {
           session_start();
           $_SESSION['user'] = $user;
          

           //Authentification reussie
           return $user;
       } else {
           //Authentification failed 
           
           return null ;
       }
   }
}
