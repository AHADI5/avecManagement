<?php 
class AvecMembres {
    private $id_membres;
    private $id_avec;

    public function __construct($id_membres, $id_avec) {
        $this->id_membres = $id_membres;
        $this->id_avec = $id_avec;

    }

    public function addMememberToAvec() {
        global $connection ;
        $result = false ;
        $requette = 'INSERT INTO avec_members(id_membre , id_avec) 
        VALUES (:id_membre , :id_avec)';
        $statement = $connection->prepare($requette);
        $execution = $statement->execute(array(
            ':id_membre'=> $this->getIdMembres(),
            ':id_avec'=> $this->getId_avec(),
        ));

        if ($execution) {
            $result = true ;
            return $result;
        } else {
            return $result;
        }
    }

    public static function getavecMembers ($id_avec){
        global $connection ;
        $result = false ;
        $requette = 'SELECT * FROM avec_members JOIN membre ON
         avec_members.id_membre = membre.id_membre WHERE id_avec = :id_avec';
        $statement = $connection->prepare($requette);

        $execution = $statement->execute(array(
            ':id_avec'=> $id_avec,
        ));
        $members = [];
        if ($execution) {
            while ($data = $statement->fetch()) {
                $members[] = $data;
            } 
             return $members;
        } else {
            return [];
        }

    }

    public static function deleteMemberFromAvec($id_member) {
        global $connection ;
        $result = false ;
        $requette = 'DELETE FROM avec_members WHERE id_membre = :id';
        $statement = $connection->prepare($requette);
        $execution = $statement->execute([
            ':id'=> $id_member,
        ]);

        if ($execution) {
            $result = true ;
            return $result;
        } else {
            return $result;
        }
    }

    public function getIdMembres() {
        return $this->id_membres;
    }

    public function getId_avec() {
        return $this->id_avec;
    }
}