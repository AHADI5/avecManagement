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
        global $connection ;
        $result = false ; 
        $requette = 'INSERT INTO epargnes(id_membre,id_avec,montant,date) 
        VALUES (:id_membre,:id_avec,:montant,:date)';
        $statement = $connection -> prepare($requette);
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

    public static function getEpargnes() {
        global $connection ;
        $requette = 'SELECT * FROM epargnes JOIN membre ON 
        membre.id_membre = epargnes.id_membre';
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

    public static function getEpargneByIdmember($id) {
        global $connection ;
        $requette = 'SELECT * FROM epargnes JOIN membre ON 
        epargnes.id_membre=membre.id_membre WHERE membre.id_membre = :id';
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

    public static function getEpargneByAvec ($id_avec) {
        global $connection ;
        $requette = 'SELECT * FROM epargnes JOIN avec ON 
        epargnes.id_avec=avec.id_avec WHERE avec.id_avec = :id_avec';
        $statement = $connection -> prepare($requette);
        $execution = $statement -> execute([
            ':id_avec'=> $id_avec,
        ]);
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