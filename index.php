<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guess My Number - Selector de mode </title>
    <link rel="stylesheet" href="css/style-shortcuts.css">
</head>
<body>
    <?php 
        if (session_status() != PHP_SESSION_ACTIVE) session_start();
        if(isset($_POST["mode"])) {
            $_SESSION["mode"] = true;
            if($_POST["mode"] == 1) {
                header('Location: /modalitat1.php');
                die();
            } elseif($_POST["mode"] == 2) {
                header('Location: /modalitat2.php');
                die();
            } elseif($_POST["mode"] == 3){
                header('Location: /results.php');
                die();
            } else {
                header('Location: /EstadisticasBDO.php');
                die();
            }
        }
    ?>

    <form action="/index.php" method="POST">
        <h1>Guess My Number</h1>
        <p>Benvingut al joc de Guess My Number</p>
        <button type="submit" name="mode" value="1">Modalitat 1</button>
        <button type="submit" name="mode" value="2">Modalitat 2</button>
        <button type="submit" name="mode" value="3">Resultats</button>
        <button type="submit" name="mode" value="4">Estadistiques</button>
    </form>

</body>
</html>