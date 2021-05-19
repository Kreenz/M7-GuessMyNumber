<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modalitat 2</title>
    <link rel="stylesheet" href="css/style-shortcuts.css">
</head>
<body class="flex-column center">
    <?php
        require_once('GuessNumber.php');
        require_once('GuessNumberModalidad2.php');
        require_once('DatabaseOOP.php');
        if (session_status() != PHP_SESSION_ACTIVE) session_start();
        $result = "";
        if(!empty($_SESSION["modalitat2"])) $guess = unserialize($_SESSION["modalitat2"]);

        if(isset($_POST["submit"])){
            if($_POST["submit"] == "start" && isset($_POST["min"]) && isset($_POST["max"])){
                if(empty($guess)){
                    $guess = new GuessNumberModalidad2($_POST["min"], $_POST["max"]);
                    $guess->generateNumber();
                } else {
                    echo "has ganao";
                    $guess->newGame($_POST["min"], $_POST["max"]);
                    $guess->generateNumber();
                }
            } else if($_POST["submit"] == "guess" && isset($_POST["guess"])){
                $result = $guess->getUserValue($_POST["guess"]);
                $guess->updateTries();
                if($result == "Has acertat el numero!") {
                    $db = new DatabaseOOP("127.0.0.1", "root", "root", "guessmynumber");
                    $db->connect();
                    $db->insert("Modalitat 2", $guess->getNivell(), $guess->getTries());
                    $db->close();
                }
            }

            if(!empty($guess))$_SESSION["modalitat2"] = serialize($guess);
        }
        
    ?>

    <div class="flex-column center">
        <form class="flex-column center type2" name="range" action="/modalitat2.php" method="POST">
            <div class="flex-row center">
                <label for="max">Numero mes baix</label>
                <input id="min" name="min" type="number">
                <label for="max">Numero mes alt</label>
                <input id="max" name="max" type="number">
            </div>
            <button type="submit" name="submit" value="start">START</button>
        </form>

    </div>
    <div class="flex-column center">
        <span class="text flex-column center"><?php echo $result; ?></span>
        <form class="flex-row center" action="/modalitat2.php" method="POST">
            <input id="number" name="guess" type="number">
            <button type="submit" name="submit" value="guess">Adivina</button>
        </form>
        <button onClick="window.history.back()">Enderrera</button>
    </div>
</body>
</html>