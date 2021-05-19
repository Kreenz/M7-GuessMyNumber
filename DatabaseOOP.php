<?php

include_once 'DatabaseConnection.php';

/**
 * Implementació de la clase DatabaseConnection segons el model OOP,
 * Object Oriented Programming.
 *
 * @author Pep
 */
class DatabaseOOP extends DatabaseConnection {

    public function __construct($servername, $username, $password, $dbname) {
        parent::__construct($servername, $username, $password, $dbname);
    }

    //put your code here
    public function connect(): void {
        $this->connection = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        // Check connection
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
            $this->connection = null;
        }
    }
    
    public function close() {
           if($this->connection != null) mysqli_close($this->connection);
    }

    public function insert($modalitat, $nivell, $intents): int {
        $sql = "INSERT INTO estadistiques (modalitat, nivell, intents) VALUES ('" . $modalitat . "', " . $nivell . ", " . $intents . ")";
        if ($this->connection != null) {
            if ($this->connection->query($sql) === TRUE) {
                return $this->connection->insert_id;
            } else {
                return -1;
            }
        }
    }

    public function selectAll() {
        $sql = "SELECT id, modalitat, nivell, data_usuari, intents FROM estadistiques";
        $result = null;
        if ($this->connection != null) {
            $result = $this->connection->query($sql, MYSQLI_USE_RESULT);
        }
        return $result;
    }

    public function selectByModalitat($modalitat) {
        $sql = "SELECT id, modalitat, nivell, data_usuari, intents FROM estadistiques WHERE modalitat = '" . $modalitat . "'";
        $result = null;
        if ($this->connection != null) {
            $result = $this->connection->query($sql, MYSQLI_USE_RESULT);
        }
        return $result;
    }

    public function delete($id) {
        $sql = "DELETE FROM estadistiques WHERE id = " . $id;
        if($this->connection != null){
            return $this->connection->query($sql);
        }
    }

    public function update($id, $modalitat, $nivell, $intents) {
        $sql = "UPDATE estadistiques
        SET modalitat = '" . $modalitat . "', nivell = " . $nivell . ", intents = " . $intents . ", data_usuari = " . date("Y-m-d H:i:s") . "
        WHERE id = " . $id . ";";
        if($this->connection != null){
            return $this->connection->query($sql);
        }
    }

    public function findById($id) {
        $sql = "SELECT * FROM estadistiques WHERE id =" . $id;
        if($this->connection != null){
            return $this->connection->query($sql);
        }
    }

}

?>