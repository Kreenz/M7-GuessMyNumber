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
        if (session_status() != PHP_SESSION_ACTIVE) session_start();
        $result = "";
        if(!empty($_POST["min"]) AND !empty($_POST["max"])){
            $_SESSION["min"] = $_POST["min"];
            $_SESSION["max"] = $_POST["max"];
            
            //$_SESSION[$_POST["min"] . "," . $_POST["max"]] = (!is_null($_SESSION[$_POST["min"] . "," . $_POST["max"]])) ? ($_SESSION[$_POST["min"] . "," . $_POST["max"]] + 1) : 1;
            $_SESSION["current"] = rand($_SESSION["min"], $_SESSION["max"]);
        }

        if(!empty($_POST["guess"])){
            if( !is_null($_SESSION["min"]) && !is_null($_SESSION["max"])){
                if($_POST["guess"] == $_SESSION["current"]){
                    $result = "HAS ADIVINAT EL NUMERO!";
                    $_SESSION["min"] = null;
                    $_SESSION["max"] = null;
                } else {
                    if($_POST["guess"] < $_SESSION["current"]){
                        $result = "ES MAJOR QUE EL NUMERO: " . $_POST["guess"];
                    }
    
                    if($_POST["guess"] > $_SESSION["current"]){
                        $result = "ES MENOR QUE EL NUMERO: " . $_POST["guess"];
                    }
                }

            }
        }
    ?>

    <div class="flex-column center">
        <form class="flex-column center" name="range" action="/modalitat2.php" method="POST">
            <div class="flex-row center">
                <label for="max">Numero mes baix</label>
                <input id="min" name="min" type="number">
                <label for="max">Numero mes alt</label>
                <input id="max" name="max" type="number">
            </div>
            <button type="submit" id="start">START</button>
        </form>

    </div>
    <div class="flex-column center">
        <span><?php echo $result; ?></span>
        <form class="flex-row center" action="/modalitat2.php" method="POST">
            <input id="number" name="guess" type="number">
            <button type="submit" id="guess">Adivina</button>
        </form>

    </div>
</body>
</html>