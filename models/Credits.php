<?php 
class Credits{
    private $date_credit;
    private $deadline;
    private $id_membre ;
    private $id_avec;
    private $montant;

    public function __construct($date_credit,$deadline,
    $id_membre,$id_avec,$montant) {
        $this->date_credit = $date_credit;
        $this->deadline = $deadline;
        $this->id_membre = $id_membre;
        $this->id_avec = $id_avec;
        $this->montant = $montant;
    }

    public function emprunter () {
        global $connection ;
        $result = false ;
        $requette = 'INSERT INTO credits(date_credit, deadline,
        id_membre,id_avec,montant) VALUES (:date_credit,:deadline,
        :id_membre,:id_avec,:montant)';

        $statement = $connection->prepare($requette);
        $execution = $statement->execute(array(
            'date_credit'=> $this->getDateCredit() ,
            'deadline'=> $this->getDeadline(),
            'id_membre'=> $this->getIdMembre(),
            'id_avec'=> $this->getIdavec(),
            'id_montant'=> $this->getMontant()
        ))  ; 

        if ($execution) {
            $result = true ;
            return $result ;
        } else {
            return $result;
        }
    }

    public static function emprunts () {
        global $connection ;
        
        $requette = 'SELECT * FROM credits';
        $statement = $connection->prepare($requette);
        $execution = $statement->execute(array()) ;
        $emprunts = [];
        if ($execution) {
            while ($data = $statement->fetch(PDO::FETCH_ASSOC)) {
                $emprunts[] = $data;
            }
            return $emprunts;
        } else {
            return [];
        }
    }

    public static function getEmpruntsbyMembres($id_membres) {
        global $connection ;
        $requette = 'SELECT * FROM epargnes JOIN membre ON 
        epargnes.id_membre=membre.id_membre WHERE id_membre = :id';
        $statement = $connection -> prepare($requette);
        $execution = $statement -> execute(array(
            ':id'=> $id_membres,
        ));
        $credits =[];
        if ($execution) {
            while ($data = $statement -> fetch()) {
                $credits[] = $data;
            }

            return $credits;
        } else return [];
    }

    
    public static function getCreditByIdavec($id) {
        global $connection ;
        $requette = 'SELECT * FROM credits JOIN  avec ON 
        credits.id_avec=avec.id_avec WHERE id_membre = :id';
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

    public function getDateCredit(){
        return $this->date_credit;
    }

    public function getDeadline() {
        return $this->deadline;
    }

    public function getIdMembre() {
        return $this->id_membre;
    }

    public function getMontant() {
        return $this->montant;
    }
    public function getIdavec() {
        return $this->id_avec;
    }

}