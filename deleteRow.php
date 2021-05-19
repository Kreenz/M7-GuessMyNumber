<?php

    require_once("DatabaseOOP.php");

    $db = new DatabaseOOP("127.0.0.1", "root", "root", "guessmynumber");
    $db->connect();
    $db->delete($_GET["id"]);
    $db->close();

?>