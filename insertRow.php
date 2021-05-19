<?php

    require_once("DatabaseOOP.php");
    $db = new DatabaseOOP("127.0.0.1", "root", "root", "guessmynumber");
    $db->connect();
    echo $db->insert($_GET["modalitat"], $_GET["nivell"], $_GET["intents"]);
    $db->close();
?>