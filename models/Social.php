<?php 

class Social {
    private $id_membre ;
    private $id_avec ;
    private $date_social ;
    private $montant ;
    public function __construct($id_membre, $id_avec,
    $date_social,$montant) {
        $this->id_membre = $id_membre;
        $this->id_avec = $id_avec;
        $this->date_social = $date_social;
        $this->montant = $montant;
    }

    public function paySocial () {
        global $connection ;
        $result = false ;
        $requette = 'INSERT INTO social(id_membre,id_avec, date_social, montant)
        VALUES(:id_membre,:id_avec, :date_social, :montant)';

        $statement = $connection->prepare($requette);
        $execution = $statement->execute(array(
            'id_membre'=> $this->getIdMembre(),
            'id_avec'=> $this->getId_avec(),
            'date_social'=> $this->getDateSocial(),
            'montant'=> $this->getMontant(),
        ));
        if ($execution) {
            $result = true ;
            return $result ;
        } else {
            return $result;
        }
    }

    public static  function getSocial() {
        global $connection ;
        $requette = 'SELECT * FROM social JOIN membre ON 
        social.id_membre=membre.id_membre';
        $statement = $connection->prepare($requette);
        $execution = $statement->execute(array()) ;
        $social = [];
        if ($execution) {
            while($data = $statement->fetch()) {
                $social[] = $data;
            }
            return $social;
        } else {
            return [];
        }
    }

    public static function getSocialByIdMembre($id_membre) {
        global $connection ;
        $result = false ;
        $requette = 'SELECT * FROM social JOIN membre ON 
        social.id_membre=membre.id_membre WHERE id_membre = :id';
        $statement = $connection -> prepare($requette);
        $execution = $statement -> execute(array(
            ':id'=> $id_membre,
        ));
      
        if ($execution) {
            while ($data = $statement -> fetch()) {
                $social[] = $data;
            }

            return $social;
        } else return [];
    }

    public static function getSocialByIdavec($id_avec) {
        global $connection ;
        $requette = 'SELECT * FROM social JOIN avec ON 
        social.id_avec=avec.id_avec WHERE id_avec = :id';
        $statement = $connection -> prepare($requette);
        $execution = $statement -> execute(array(
            ':id'=> $id_avec,
        ));
      
        if ($execution) {
            while ($data = $statement -> fetch()) {
                $social[] = $data;
            }

            return $social;
        } else return [];
    }



    public function getIdMembre(){
        return $this->id_membre;
    }
    public function setIdMembre($id_membre){
        $this->id_membre = $id_membre;
    }
    public function getId_avec(){
        return $this->id_avec;
    }
    public function setDateSocial($date_social){
        $this->date_social = $date_social;
    }
    public function getDateSocial(){
        return $this->date_social;
    }
    public function getMontant(){
       return $this->montant;
    }
}
