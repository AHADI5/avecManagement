<?php 
class Avec
{
    private $dateDebut ;
    private $dateFin;
    private $solde;
    private $partValue;
    private $tauxInteret;
    private $socialValue ;




    /**
     * 
     * 
     */

    function __construct($dateDebut,$dateFin,$solde, 
    $partValue,$tauxInteret,$socialValue){
        $this->dateDebut = $dateDebut;
        $this->dateFin = $dateFin;
        $this->solde = $solde;
        $this->partValue = $partValue;
        $this->tauxInteret = $tauxInteret;
        $this->socialValue = $socialValue;
       
    }

    public function registerAvec() {
        global $connection;
        $result = false ;
        $requette = 'INSERT INTO avec (date_debut, date_fin, solde,
         part_value , taux_interet, social_value) VAlUES (:date_debut,:date_fin,:solde,
         :part_value ,:taux_interet, :social_value)';
        $statement = $connection -> prepare($requette);
        $execution = $statement -> execute([

            ':date_debut' => $this -> getdateDebut(),
            ':date_fin'=> $this -> getdateFin(),
            ':solde'=> $this -> getSolde(),
            ':part_value'=> $this -> getPartValue(),
            ':taux_interet'=> $this->getTauxInteret(),
            ':social_value'=> $this -> getSocialValue(),

        ]);

        if ($execution) {
            $result = true ;
            return $result ;
        } else {
            return $result ;
        }
        
    }

    public static function getAvec() {
        global $connection ;
        $requette = 'SELECT * FROM avec';
        $statement = $connection -> prepare($requette);
        $execution = $statement -> execute([]);
        $avecs = [];
        if ($execution) {
            while ($data = $statement -> fetch()) {
                $avec = new Avec($data['date_debut'], $data['date_fin'], $data['solde'],
                $data['part_value'],$data['taux_interet'],$data['social_value']);
                $avecs[] = $avec;
                array_push($avecs, $avec);
            } 

            return $avecs ;
        } else return [];
    }

    public static function getAvecById ($id) {
        global $connection ;
        $requette = 'SELECT * FROM avec WHERE id_avec = :id_avec';
        $statement = $connection -> prepare($requette);
        $execution = $statement -> execute([
            'id_avec'=> $id
        ]);
       
        if ($execution) {
            $data = $statement -> fetch();
            $avec = new Avec($data['date_debut'], $data['date_fin'], $data['solde'],
                $data['part_value'],$data['taux_interet'],$data['social_value']);
            return $avec ;
        } else return null;
    }

    public static function modifyAvec(
        $id,
        $date_debut,
        $date_fin,
        $partValue ,
        $taux_interet,
        $social_value 
    ) {
        $resultat = false ;
        global $connection ;
        $requette = 'UPDATE avec SET date_debut=:date_debut, 
        date_fin = :date_fin, part_value = :part_value,
        taux_interet = :taux_interet,social_value = :social_value WHERE id_avec = :id';

        $statement = $connection -> prepare($requette);
        $execution = $statement -> execute([
           
            'date_debut'=> $date_debut,
            'date_fin'=> $date_fin,
            'part_value'=> $partValue,
            'taux_interet'=> $taux_interet,
            'social_value'=> $social_value,
            'id'=> $id,
        ]);

        if ($execution) {
            $resultat = true ;
            return $resultat ;
        } else return $resultat;
        
    }



    public function getdateDebut () {
        return $this->dateDebut;
    }
    public function getdateFin () {
        return $this->dateFin;
    }
    public function getSolde () {
        return $this->solde;
    }
    public function getPartValue () {
        return $this->partValue;
    }
    public function getTauxInteret () {
        return $this->tauxInteret;
    }
    public function getSocialValue () {
        return $this->socialValue;
    }
  
}
