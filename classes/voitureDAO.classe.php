<?php

class voitureDAO extends DAO {
    /**
    * Constructeur
    */
    function __construct() {
    parent::__construct();
    }
    /**
    * Lecture d'un salarié par son ID
    * @param type $id_salarie
    * @return \Salarie
    * @throws Exception
    */
    function find($id_voiture) {
    $sql = "select * from voiture where id= :id_voiture";
    try {
    $sth = $this->pdo->prepare($sql);
    $sth->execute(array(":id_voiture" => $id_voiture));
    $row = $sth->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
    throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }
    $voiture = new voiture($row);
    // Retourne l'objet métier
    return $voiture;
    } // function find()
    

    function findAll() {
        $sql = "select * from voiture";
        try {
        $sth = $this->pdo->prepare($sql);
        $sth->execute();
        $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
        throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
        }
        $voitures = array();
        foreach ($rows as $row) {
        $voitures[] = new Voiture($row);
        }
        // Retourne un tableau d'objets "voiture"
        return $voitures;
        } // function findAll()
    
	
	function update($id_voiture,$marque,$modele) {
        $sql = "Update voiture SET marque=:marque , modele=:modele where id=:id_voiture";
        try {
            $sth = $this->pdo->prepare($sql);
            $sth->execute(array(":id_voiture" => $id_voiture, ":marque" => $marque, ":modele" => $modele));
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
        }
    }

    function delete($id_voiture) {
        $sql = "delete FROM voiture WHERE id=:id_voiture";
        try {
            $sth = $this->pdo->prepare($sql);
            $sth->execute(array(":id_voiture" => $id_voiture));
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
        }
    }

    function insert($marque,$modele) {
        $sql = "Insert into voiture(marque,modele) VALUES (:marque , :modele)";
        try {
            $sth = $this->pdo->prepare($sql);
            $sth->execute(array(":marque" => $marque, ":modele" => $modele));
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
        }
    }

    }
?>