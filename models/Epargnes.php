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

    public function getEpargnes() {
        global $connection ;
        $requette = 'SELECT * FROM epargnes JOIN membre ON 
        membre.id_membre = epargenes.id_membre';
        $statement = $connection -> prepare($requette);
        $execution = $statement -> execute(array());

        $epargnes  =[];

        if ($execution) {
            while ($data = $statement -> fetch()) {
                $epargnes[] = $data;
            }
            return $epargnes;
        } else {
            return [];
        }
    }

    public function getEpargneByIdmember($id) {
        global $connection ;
        $requette = 'SELECT * FROM epargnes JOIN membre ON 
        epargnes.id_membre=membre.id_membre WHERE id_membre = :id';
        $statement = $connection -> prepare($requette);
        $execution = $statement -> execute(array(
            ':id'=> $id,
        ));
        $epargne =[];
        if ($execution) {
            while ($data = $statement -> fetch()) {
                $epargne[] = $data;
            }

            return $epargne;
        } else return [];
    }

    public function getEpargneByAvec ($id_avec) {
        global $connection ;
        $requette = 'SELECT * FROM epargnes JOIN membre ON 
        epargnes.id_avec=membre.id_avec WHERE id_avec = :id';
        $statement = $connection -> prepare($requette);
        $execution = $statement -> execute(array(
            ':id'=> $id_avec,
        ));
        $epargne =[];
        if ($execution) {
            while ($data = $statement -> fetch()) {
                $epargne[] = $data;
            }

            return $epargne;
        } else return [];

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