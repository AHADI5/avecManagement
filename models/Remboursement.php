<?php 
class Remboursement{
    private $id_membre;
    private $id_credit;
    private $id_avec ;
    private $date_remboursement ;
    private $montant ;



    public function __construct($id_membre, $id_credit,$id_avec,
    $date_remboursement,$amount) {
        $this->id_membre = $id_membre;
        $this->id_credit = $id_credit;
        $this->id_avec = $id_avec;
        $this->date_remboursement = $date_remboursement;
        $this->montant = $amount;

    }

    public function giveBack( ) {
        global $connection ;
        $result = false ;
        $requette = 'INSERT INTO remboursements(id_membre, id_credit,
        id_avec , date_remb ,montant) VALUES (:id_membre, :id_credit,
        :id_avec , :date_remb ,:montant)' ;

        $statement = $connection->prepare( $requette );
        $execution = $statement->execute( array( 
            'id_membre'=> $this->getIdMembre(),
            'id_credit'=> $this->getIdCredit(),
            'id_avec'=> $this->getId_avec(),
            'date_remb'=> $this->getDateRemboursement(),
            'montant' => $this -> getMontant(),
        ));

        if( $execution) {
            $result  = true ;
            return $result ;
        } else {
            $result = false ;
        }
    }

    
    public function getIdMembre(){
        return $this->id_membre;
    }

    public function getIdCredit(){
        return $this->id_credit;
    }

    public function getId_avec(){
        return $this->id_avec;
    }

    public function getDateRemboursement(){
        return $this->date_remboursement;
    }
    public function getMontant(){
        return $this->montant;
    }
}