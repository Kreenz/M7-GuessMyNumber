<html>
<head>
    <title>Estadisticas</title>
    <style>
    #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even){background-color: #f2f2f2;}
    
    #customers tr{background-color: white}

    #customers tr:hover {background-color: #ddd;}

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }
    </style>
</head>
<body style="background-color:#ade6ee">
    <select name="users" onchange="showTable(this.value)">
        <option value="">Todos</option>
        <option value="Modalitat 1">Humano</option>
        <option value="Modalitat 2">Maquina</option>
    </select>
<?php
    require_once('DatabaseOOP.php');
    $db = new DatabaseOOP("127.0.0.1", "root", "root", "guessmynumber");

    $db->connect();
    $result = $db->selectAll();
    ?>
    <div id="fakeTable">
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
    </div>

    <form id="insert">
        <label for="intents">Intents</label>
        <input type="text" name="intents">

        <label for="nivell">Nivell</label>
        <input type="text" name="nivell">
        
        <label for="modalitat">Modalitat</label>
        <select name="modalitat">
            <option value="Modalitat 1">Humano</option>
            <option value="Modalitat 2">Maquina</option>
        </select>

        <button id="insertRow" type="submit">INSERIR FILA</button>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>

        document.getElementById("insertRow").addEventListener("click", (e)=> {
            e.preventDefault();
            let form = document.getElementById("insert").elements;

            $.ajax({
            url: '/insertRow.php?modalitat=' + form["modalitat"].value + "&nivell=" + form["nivell"].value + "&intents=" + form["intents"].value,
            success: function(respuesta) {
                if(respuesta != "-1")showTable(false)
            },
            error: function() {
                console.log("No se ha podido obtener la información");
            }
            });
            
        });

        function deleteRow(e){
            let id = e.id;
            e.parentNode.parentNode.remove();
            
            $.ajax({
            url: '/deleteRow.php?id=' + id,
            success: function(respuesta) {
                console.log(respuesta);
            },
            error: function() {
                console.log("No se ha podido obtener la información");
            }
            });
        }

        function showTable(modalitat){
            let extra = (modalitat) ?  "?modalitat=" + modalitat : "" ;
            console.log(extra);
            $.ajax({
            url: '/getData.php' + extra,
            success: function(respuesta) {
                document.getElementById("fakeTable").innerHTML = respuesta;
                console.log(respuesta);
            },
            error: function() {
                console.log("No se ha podido obtener la información");
            }
            });
        }

    </script>
    <button onClick="window.history.back()">Enderrera</button>    
</body>
</html>
