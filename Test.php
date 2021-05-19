<?php

    require_once("DatabaseProc.php");
    require_once("DatabaseOOP.php");
    require_once("DatabasePDO.php");

    $db2 = new DatabaseOOP("127.0.0.1", "root", "root", "guessmynumber");
    $db2->connect();
    //$db2->insert("Modalitat 1", 1, 3);
    //$db2->delete(6);
    //$db2->update(5, "Modalitat 1", "100", 5);
    //$db2->findById(6);

    $db = new DatabaseProc("127.0.0.1", "root", "root", "guessmynumber");
    $db->connect();
    //$db->insert("Modalitat 2", 1, 3);
    //$db->delete(6);
    //$db->update(5, "Modalitat 1", "100", 5);
    //$db->findById(6);

    $db3 = new DatabasePDO("127.0.0.1", "root", "root", "guessmynumber");
    $db3->connect();
    //$db3->insert("Modalitat 2", 1, 3);
    //$db3->delete(6);
    //$db3->update(5, "Modalitat 1", "100", 5);
    //$db3->findById(6);
?>