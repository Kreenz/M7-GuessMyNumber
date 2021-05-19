  
<?php
include_once 'DB.php';

/**
 * DatabaseConnection és una classe abstracta que només té les propietat
 * comunes de tots els tipus d'implementació: OOP, procedimental i PDO
 * @author Pep
 */

abstract class DatabaseConnection implements DB {
    protected $servername;
    protected $username;
    protected $password;
    protected $dbname;
    protected $connection;

    function __construct($servername, $username, $password, $dbname) {
        $this->servername = $servername;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;
    }

    function __destruct() {
        $this->connection = null;
    }
    
    public function getConnection() {
        return $this->connection;
    }

}

?>