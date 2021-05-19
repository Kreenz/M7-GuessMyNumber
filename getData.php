<?php

    require_once("DatabaseOOP.php");

    $db = new DatabaseOOP("127.0.0.1", "root", "root", "guessmynumber");
    $db->connect();
    if(isset($_GET["modalitat"])){
        $result = $db->selectByModalitat($_GET["modalitat"]);
    } else {
        $result = $db->selectAll();
    }
    
    ?>
    <table id="customers" style="width:100%">
    <tr>
        <th>modalitat</th>
        <th>nivell</th>
        <th>data_partida</th>
        <th>intents</th>
        <th></th>
    </tr>
    <?php
    while ($fila = $result->fetch_row()) {
        ?>
        <tr>
        <?php
            echo "<td>" . $fila[1] . "</td>";
            echo "<td>" . $fila[2] . "</td>";
            echo "<td>" . $fila[3] . "</td>";
            echo "<td>" . $fila[4] . "</td>";
            echo "<td><button id=" . $fila[0] . " onClick='deleteRow(this)'> Borrar Registre </button></td>";
        ?>
        </tr>
        <?php 
    }

    $db->close();
    ?>
    </table>