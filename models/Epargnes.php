<?php 
class Epargnes {
    private $id_membre ;
    private $id_avec;
    private $parts;
    private $montant ;
    private $date ;



    public function __construct($id_membre, $id_avec, $montant, $date, $parts) {
        $this->id_membre = $id_membre;
        $this->id_avec = $id_avec;
        $this->montant = $montant;
        $this->date = $date;
        $this ->parts =$parts;
    }

    public function eparnger() {
        global $connection ;
        $result = false ; 
        $requette = 'INSERT INTO epargnes(id_membre,id_avec,montant,date,parts) 
        VALUES (:id_membre,:id_avec,:montant,:date,:parts)';
        $statement = $connection -> prepare($requette);
        $execution = $statement -> execute(array(
            'id_membre'=> $this->getIdmembre(),
            'id_avec'=> $this->getIdavec(),
            'montant'=> $this->getMontant(),
            'date'=> $this->getDate(),
            'parts' => $this -> getParts()
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

    public static function getEpargneByAvec ($id_avec, $idMember) {
        global $connection ;
        $requette = 'SELECT * FROM epargnes WHERE id_avec = :id_avec 
        AND epargnes.id_membre = :id_membre';
        $statement = $connection -> prepare($requette);
        $execution = $statement -> execute([
            ':id_avec'=> $id_avec,
            ':id_membre' => $idMember
        ]);
        $epargne =[];
        if ($execution) {
            while ($data = $statement -> fetch()) {
                $epargne[] = $data;
            }
            return $epargne;
        } else return [];
    }

    public static function getSavedMoney($id_member){
        global $connection;
        $requette  = 'SELECT SUM(montant) AS amountSaved FROM
         epargnes WHERE id_membre = :id ';
        $statement = $connection -> prepare($requette);
        $execution = $statement -> execute ([
            'id' => $id_member,
        ]);
        if ($execution) {
            $data = $statement -> fetch();
            $montant = $data['amountSaved'];
            return $montant;
        } else {
            return null;
        }
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
    public function getParts(){
        return $this->parts ;
    }
}