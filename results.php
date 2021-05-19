<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultats</title>
    <link rel="stylesheet" href="css/style-shortcuts.css">
</head>
<body class="flex-column center">
    <?php
    require_once('GuessNumber.php');
    require_once('GuessNumberModalidad1.php');
    require_once('GuessNumberModalidad2.php');


    if (session_status() != PHP_SESSION_ACTIVE) session_start();

    if(!empty($_SESSION["modalitat1"])) $guess1 = unserialize($_SESSION["modalitat1"]);
    if(!empty($_SESSION["modalitat2"])) $guess2 = unserialize($_SESSION["modalitat2"]);
    
    ?>
    <div class="text2 flex-column center">
        <h4>Modalitat 1</h4>
        <div>
            <?php
                

                if(isset($guess1)){
                    echo "Victorias: " . $guess1->getWins() . "\n";
                    echo "Intents: " . $guess1->getTries();
                }
            ?>
        </div>
    </div>
    <div class="text flex-column center">
        <h4>Modalitat 2</h4>
        <div>
            <?php
                if(isset($guess2)){
                    echo "Victorias: " . $guess2->getWins() . "\n";
                    echo "Intents: " . $guess2->getTries();
                }
            ?>
        </div>
    </div>
    <button onClick="window.history.back()">Enderrera</button>
</body>
</html>