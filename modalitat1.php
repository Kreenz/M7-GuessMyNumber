<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modalitat 1</title>
    <link rel="stylesheet" href="css/style-shortcuts.css">
</head>
<body class="flex-column center">

    <div class="flex-column center">
        <form class="flex-column center" name="range" action="/modalitat1.php" method="POST">
            <div class="box blue"></div>
            <div class="box yellow"></div>
            <div class="box pink"></div>
            <div class="box mash"></div>

            <div class="flex-row center tipus">
                <button type="submit" name="dificultat" value=10>RANG: 1 - 10</button>
                <button type="submit" name="dificultat" value=50>RANG: 1 - 50</button>
                <button type="submit" name="dificultat" value=100>RANG: 1 - 100</button>
            </div>

            <div class="flex-column center text">
                <?php
                    require_once('GuessNumber.php');
                    require_once('GuessNumberModalidad1.php');
                    require_once('DatabaseOOP.php');
                    if (session_status() != PHP_SESSION_ACTIVE) session_start();
                    $call = "";
                    if(!empty($_SESSION["modalitat1"])) $guess = unserialize($_SESSION["modalitat1"]);

                    if(isset($_POST["dificultat"])){
                        if(empty($guess)) $guess = new GuessNumberModalidad1(1, $_POST["dificultat"]);
                        else $guess->newGame(1, $_POST["dificultat"]);
                        $guess->guessType(false);
                        $call = "Partida començada! Rang seleccionat: 1 - " . $_POST["dificultat"] . "\n" . "El numero podria ser aquest: " . $guess->getVal();
                        $_SESSION["modalitat1"] = serialize($guess);
                    }
                    
                    if(isset($_POST["rang"]) && !empty($guess)){
                        $guess->guessType($_POST["rang"]);
                        if($guess->getStatus() != true){
                            $call = "El numero podria ser aquest: " . $guess->getVal();
                            $guess->updateTries();
                        } else {
                            $call = "Has guanyat aquesta partida!";
                            $db = new DatabaseOOP("127.0.0.1", "root", "root", "guessmynumber");
                            $db->connect();
                            $db->insert("Modalitat 1", $guess->getNivell(), $guess->getTries());
                            $db->close();
                        } 
                        
                        $_SESSION["modalitat1"] = serialize($guess);
                    }
                    
                ?>

                <div><?php echo $call; ?></div>
            </div>
            <button type="submit" name="rang" value="+">ES MAJOR</button>
            <button type="submit" name="rang" value="-">ES MENOR</button>
            <button type="submit" name="rang" value="=">ES EL NUMERO</button>
        </form>
        <button onClick="window.history.back()">Enderrera</button>
    </div>
</body>
</html>