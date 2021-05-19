<?php

include_once 'DatabaseConnection.php';

/**
 * Implementació de la clase DatabaseConnection segons el model Procedimental.
 *
 * @author Pep
 */
class DatabaseProc extends DatabaseConnection {

    public function __construct($servername, $dbname, $username, $password) {
        parent::__construct($servername, $dbname, $username, $password);
    }

    public function connect(): void {
        $this->connection = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        if (!$this->connection) {
            die("Connection failed: " . mysqli_connect_error());
            $this->connection = null;
        }
    }

    public function insert($modalitat, $nivell, $intents): int {
        $sql = "INSERT INTO estadistiques (modalitat, nivell, intents) VALUES ('" . $modalitat . "', " . $nivell . "," . $intents . ")";
        if ($this->connection != null) {
            if (mysqli_query($this->connection, $sql)) {
                return mysqli_insert_id($this->connection);
            } else {
                return -1;
            }
        }
    }

    public function selectAll() {
        $sql = "SELECT id, modalitat, nivell, data_partida, intents FROM estadistiques";
        $result = null;
        if ($this->connection != null) {
            $result = mysqli_query($this->connection, $sql);
        }
        return $result;        
    }

    public function selectByModalitat($modalitat) {
        $sql = "SELECT id, modalitat, nivell, data_partida, intents FROM estadistiques WHERE modalitat = '" . $modalitat . "'";
        $result = null;
        if ($this->connection != null) {
            $result = mysqli_query($this->connection, $sql);
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
        SET modalitat = '" . $modalitat . "', nivell = " . $nivell . ", intents = " . $intents . ", data_usuari = '" . date("Y-m-d H:i:s") . "'
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