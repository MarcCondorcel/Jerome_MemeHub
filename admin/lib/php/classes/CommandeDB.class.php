<?php

class CommandeDB extends Commande {

    private $_db;
    private $_commande = array();

    public function __construct($cnx) {
        $this->_db = $cnx;
    }

    public function addCommande(array $data) {

        try {
            $query = "insert into commande (id_client,id_produit,prix) values (:id_client,:id_produit,:prix)";

            //var_dump($query);
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':id_client', $data['id_client'], PDO::PARAM_STR);
            $resultset->bindValue(':id_produit', $data['id_produit'], PDO::PARAM_STR);
            $resultset->bindValue(':prix', $data['prix'], PDO::PARAM_STR);
            $resultset->execute();
            //$retour = $resultset->fetchColumn(0);
            //return $retour;
        } catch (PDOException $e) {
            print "<br/>Echec de l'insertion";
            print $e->getMessage();
        }
    }

    function getCommandeClient($id) {
        try {
            $query = "SELECT * FROM COMMANDE where ID_CLIENT=:id_client";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':id_client', $id);
            $resultset->execute();
            $data = $resultset->fetchAll();
//var_dump($data);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                $_infoArray[] = $data;
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }
        return $_infoArray;
    }

    public function delCommande($id_client_,$id_produit) {

        try {
            $query = "delete from commande where id_produit = :id_produit and id_client = :id_client";

            var_dump($query);
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':id_produit',$id_jeu);
            $resultset->bindValue(':id_client',$id_client);
            $resultset->execute();
            //$retour = $resultset->fetchColumn(0);
            //return $retour;
        } catch (PDOException $e) {
            print "<br/>Echec de la suppression";
            print $e->getMessage();
        }
    }

}
