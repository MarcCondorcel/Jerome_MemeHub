<?php

class ClientDB extends Client {

    private $_db;
    private $_client = array();

    public function __construct($cnx) {
        $this->_db = $cnx;
    }

    public function addClient(array $data) {

        $query = "insert into client (nom,prenom,password,adresse,localite,tel,email) values (:nom,:prenom,:password,:adresse,:localite,:tel,:email)";

        try {
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':nom', $data['nom'], PDO::PARAM_STR);
            $resultset->bindValue(':prenom', $data['prenom'], PDO::PARAM_STR);
            $resultset->bindValue(':password', $data['password'], PDO::PARAM_STR);
            $resultset->bindValue(':adresse', $data['adresse'], PDO::PARAM_STR);
            $resultset->bindValue(':localite', $data['localite'], PDO::PARAM_STR);
            $resultset->bindValue(':tel', $data['tel'], PDO::PARAM_STR);
            $resultset->bindValue(':email', $data['email'], PDO::PARAM_STR);
            $resultset->execute();
            //$retour = $resultset->fetchColumn(0);
            //return $retour;
            
        } catch (PDOException $e) {
            print "Données non encodées";
            print $e->getMessage();
        }
    }
    
    function isClient($email, $password) {
        try {
            $query = "select * from client where email = :email and password = :password";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':email', $email);
            $resultset->bindValue(':password', $password);
            $resultset->execute();
            $data = $resultset->fetch();
            if (!empty($data)) {
                try {
                    $_client[] = new Client($data);
                    if ($_client[0]->email == $email && $_client[0]->password ==$password ) {
                        return $_client;
                    } else {
                        return null;
                    }
                } catch (PDOException $e) {
                    print $e->getMessage();
                }
            }
        } catch (PDOException $e) {
            print "Requete échouée" . $e->getMessage();
        }
    }
    
    function getClient($id_client) {
        try {
            $query = "select * from client where id_client = :id_client";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':id_client', $id_client);
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

}
