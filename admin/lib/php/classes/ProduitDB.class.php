<?php

class ProduitDB extends Produit {

    private $_db;
    private $_array = array();

    public function __construct($db) {//contenu de $cnx (index)
        $this->_db = $db;
    }

    public function addProduit($data) {
        //$_db->beginTransaction();
        try {

            $query = "";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':id_produit', $data['id_produit']);
            $resultset->bindValue(':type', $data['type']);
            $resultset->bindValue(':description', $data['description']);
            $resultset->bindValue(':stock', $data['stock']);
            $resultset->bindValue(':prix_tot', $data['prix_tot']);
            $resultset->bindValue(':type', $data['type']);
            $resultset->execute();
            $retour = $resultset->fetchColumn(0);
            return $retour;
        } catch (PDOException $e) {
            print "Echec de l'insertion " . $e->getMessage();
        }
        //$_db->commit();
    }
    
    public function getProduitAll() {
        try {
            $query = "select * from produit";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            while ($data = $resultset->fetch()) {
                $_array[] = $data;
            }
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        if (!empty($_array)) {
            return $_array;
        } else {
            return null;
        }
    }
    
    public function getProduitPhoto() {
        try {
            $query = "select * from produit where type=1";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            while ($data = $resultset->fetch()) {
                $_array[] = $data;
            }
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        if (!empty($_array)) {
            return $_array;
        } else {
            return null;
        }
    }
    
    public function getProduitTemplate() {
        try {
            $query = "select * from produit where type=2";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            while ($data = $resultset->fetch()) {
                $_array[] = $data;
            }
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        if (!empty($_array)) {
            return $_array;
        } else {
            return null;
        }
    }
    
    function getProduit($id) {
        try {
            $query = "SELECT * FROM produit where ID_produit=:id_produit";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':id_produit', $id);
            $resultset->execute();
            $data = $resultset->fetchAll();
//var_dump($data);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                $_array[] = $data;
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }
        return $_array;
    }
}

