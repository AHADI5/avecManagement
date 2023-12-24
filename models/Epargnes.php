<?php 
class Epargnes {
    private $id_membre ;
    private $id_avec;
    private $montant ;
    private $date ;



    public function __construct($id_membre, $id_avec, $montant, $date) {
        $this->id_membre = $id_membre;
        $this->id_avec = $id_avec;
        $this->montant = $montant;
        $this->date = $date;
    }

    public function eparnger() {
        global $conncection ;
        $result = false ; 
        $requette = 'INSERT INTO epargnes(id_membre,id_avec,montant,date) 
        VALUES (:id_membre,:id_avec,:montant,:date)';
        $statement = $conncection -> prepare($requette);
        $execution = $statement -> execute(array(
            'id_membre'=> $this->getIdmembre(),
            'id_avec'=> $this->getIdavec(),
            'montant'=> $this->getMontant(),
            'date'=> $this->getDate()
        ));

        if ($execution) {
            $result = true ;
            return $result ;
        } else {
            return $result;
        }
    }

    public function getEpargnesMembre() {
        
    }

    public function getIdmembre(){
        return $this->id_membre ;
    }
    public function getIdavec(){
        return $this->id_avec ;
    }

    public function getMontant(){
        return $this->montant ;
    }

    public function getDate(){
        return $this->date ;
    }
}