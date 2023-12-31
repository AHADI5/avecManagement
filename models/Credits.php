<?php 
class Credits{
    private $date_credit;
    private $id_membre ;
    private $id_avec;
    private $montant;
    private $status ;

    public function __construct($date_credit,
    $id_membre,$id_avec,$montant, $status) {
        $this->date_credit = $date_credit;
        $this->id_membre = $id_membre;
        $this->id_avec = $id_avec;
        $this->montant = $montant;
        $this -> status = $status;
    }

    public function emprunter () {
        global $connection ;
        $result = false ;
        $requette = 'INSERT INTO credits(date_credit, 
        id_membre,id_avec,montant ,credit_status) VALUES (:date_credit,
        :id_membre,:id_avec,:montant ,:credit_status)';

        $statement = $connection->prepare($requette);
        $execution = $statement->execute(array(
            'date_credit'=> $this->getDateCredit() ,
            'id_membre'=> $this->getIdMembre(),
            'id_avec'=> $this->getIdavec(),
            'montant'=> $this->getMontant(),
            'credit_status' => $this -> getStatus(),
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
        
        $requette = 'SELECT * FROM credits JOIN membre ON 
        credits.id_membre=membre.id_membre ';
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
        $requette = 'SELECT * FROM credits JOIN membre ON 
        credits.id_membre=membre.id_membre WHERE credits.id_membre = :id';
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
        $requette = 'SELECT * FROM credits
        JOIN membre ON membre.id_membre = credits.id_membre
        WHERE credits.id_avec = :id';
        
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
    
    public static function payCredit($idMmbre ,$idAvec ,$montant ) {
        global $connection ;
        $result = false ;
        $requette = 'UPDATE credits SET montant= montant - :montant
        WHERE id_membre = :id_membre AND id_avec = :id_avec';
        $statement = $connection->prepare($requette);
        $execution = $statement->execute(array(
  
            'id_membre'=> $idMmbre,
            'id_avec'=> $idAvec,
            'montant'=> $montant
        ))  ; 

        if ($execution) {
            $result = true ;
            return $result ;
        } else {
            return $result;
        }

    } 

    public static function getUpdatedCredit($idAvec, $idMembre) 
    {
        global $connection ;
        $requette = 'SELECT montant FROM credits WHERE
         id_avec = :id_avec AND id_membre = :id_membre';
         $statemnt = $connection -> prepare($requette);
         $execution  = $statemnt -> execute([
            'id_avec' => $idAvec,
            'id_membre' => $idMembre,
         ]);

         if ($execution) {
            $data = $statemnt -> fetch();
            $montant = $data['montant'];
            return $montant;
         } else {
            return null;
         }
         

    }

    public static function amountBorroed () {
        global $connection ;
        $requette = 'SELECT SUM(montant) as totalAmount FROM credits';
        $statement = $connection -> prepare($requette);
        $execution = $statement -> execute([]);

        if ($execution) {
            $data = $statement -> fetch();
            $amountBorrowed =  $data['totalAmount'];
            return $amountBorrowed;
        } else {
            return 0;
        }

    }

    public static function checkCredit ($idMember , $idAvec) {
        global $connection ;
        $requette = 'SELECT credit_status FROM credits WHERE
         id_avec = :id_avec AND id_membre = :id_membre';
         $statemnt = $connection -> prepare($requette);
         $execution  = $statemnt -> execute([
            'id_avec' => $idAvec,
            'id_membre' => $idMember,
         ]);
         
         if ($execution) {
            $data = $statemnt -> fetch(PDO::FETCH_ASSOC) ;
            if ($data != null) {
               return $data['credit_status'] ;
            } else  {
                return 2;
            }
           
         }
    }

    public static function getCreditAmount($idAvec, $idMember) {
        global $connection ;
        $requette = 'SELECT montant FROM credits WHERE
         id_avec = :id_avec AND id_membre = :id_membre';
         $statemnt = $connection -> prepare($requette);
         $execution  = $statemnt -> execute([
            'id_avec' => $idAvec,
            'id_membre' => $idMember,
         ]);
         
         if ($execution) {
            $data = $statemnt -> fetch(PDO::FETCH_ASSOC) ;
            if ($data != null) {
               return $data['montant'] ;
            } else  {
                return 2;
            }
         }
    }

    public static function updateStatusCredit ($idMember , $idAvec, $newStatus) {
        global $connection ;
        $result = false ;
        $requette = 'UPDATE credits SET credit_status = :credit_status
        WHERE id_membre = :id_membre AND id_avec = :id_avec';
        $statement = $connection->prepare($requette);
        $execution = $statement->execute(array(
            'id_membre'=> $idMember,
            'id_avec'=> $idAvec,
            'credit_status' => $newStatus,
        )); 

        if ($execution) {
            $result = true ;
            return $result ;
        } else {
            return $result;
        }
    }

    public function getDateCredit(){
        return $this->date_credit;
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
    public function getStatus() {
        return $this -> status;
    }

}