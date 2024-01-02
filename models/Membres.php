<?php 

class Membres {
    private $nom;
    private $postnom;
    private $adresse;
    private $telepone;
    function __construct($nom, $postnom, $adresse, $telepone) {
        $this->nom = $nom;
        $this->postnom = $postnom;
        $this->adresse = $adresse;
        $this->telepone = $telepone;
    }

    public function createMember () {
        global $connection ;
        $result = false ;
        $requette = 'INSERT INTO membre(nom,postnom,adresse,telephone)
        VALUES (:nom,:postnom,:adresse,:telephone)';
        $stmt = $connection->prepare($requette);
        $execution = $stmt->execute(array(
            'nom'=> $this->getNom(),
            'postnom'=> $this->getpostnom(),
            'adresse'=> $this->getadresse(),
            'telephone'=> $this->getTelephone(),
        ));

        if ($execution ) {
            $result = true ;
            return $result;
        } else {
            return $result;
        }
    }

    public static function getMembres() {
        global $connection ;
        $requette = 'SELECT * FROM membre';
        $stmt = $connection->prepare($requette);
        $execution = $stmt->execute(array());
        $membres = [];
        if ($execution ) {
            while ($data = $stmt->fetch()) {
                $membre = new Membres($data['nom'], $data['postnom'],
                $data['adresse'], $data['telephone']) ;
                array_push($membres,$membre);
            }
            return $membres;
        } else {
            return null ;
        }

    }

    public static function getMembreId($id) {
        global $connection ;
        $requette = 'SELECT * FROM membre WHERE id_membre = :id';
        $stmt = $connection->prepare($requette);
        $execution = $stmt->execute(array(
            'id'=> $id
        ));
        if ($execution ) {
            while ($data = $stmt->fetch()) {
                $membre = new Membres($data['nom'], $data['postnom'],
                $data['adresse'], $data['telephone']) ;
            }
            return $membre;
        } else {
            return null ;
        }
    }

    public static function deleteMembre($id) {
        global $connection ;
        $result = false ;
        $requette = 'DELETE FROM avec_members WHERE id_membre = :id_membre';
        $stmt = $connection->prepare($requette);
        $execution = $stmt->execute(array(
            ':id_membre'=> $id
        ));

        if ($execution ) {
            $result = true ;
            return $result ;
        } else {
            return $result;
        }
    }

    public static function updateMembre($id,$nom,$postnom,
    $adresse,$telephone) {
        global $connection ;
        $result =  false ;
        $requette = 'UPDATE membre SET nom = :nom , postnom = :postnom,
         adresse = :adresse, telephone = :telephone WHERE id_membre = :id';
        
        $statement = $connection->prepare($requette);
        $execution = $statement->execute(array(
            'id'=> $id,
            'nom'=> $nom,
            'postnom'=> $postnom,
            'adresse'=> $adresse,
            'telephone'=> $telephone
        ));

        if ($execution) {
            $result = true ;
            return $result ;
        } else {
            return $result ;
        }

    }

    public function getId(){
        global $connection ;
        $requette = 'SELECT id_membre FROM membre WHERE 
        nom = :nom AND postnom = :postnom AND telephone= :telephone';
        $stmt = $connection->prepare($requette);
        $execution = $stmt->execute([
            'nom'=> $this->getNom(),
            'postnom'=> $this->getPostnom(),
            'telephone'=> $this->getTelephone(),

        ]);
        
        if ($execution) {
            $data = $stmt->fetch();
            $numeo = $data['id_membre'];
            return $numeo ;
        } else {
            return null ;
        }
    }


    public function getNom() {
        return $this->nom;
    }
    public function getPostnom() {
        return $this->postnom;
    }
    public function getAdresse() {
        return $this->adresse;
    }

    public function getTelephone() {
        return $this->telepone;
    }
}

