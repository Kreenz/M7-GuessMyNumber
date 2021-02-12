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
            <button type="submit" name="facil">RANG: 1 - 10</button>
            <button type="submit" name="normal">RANG: 1 - 50</button>
            <button type="submit" name="dificil">RANG: 1 - 100</button>
            <div class="flex-row center">
                <?php
                    if (session_status() != PHP_SESSION_ACTIVE) session_start();
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        if (isset($_POST['facil'])) {
                            $_POST[]
                        } elseif(isset($_POST['normal']))){
                            
                        } elseif(isset($_POST['dificil']))){
                            
                        }

                        if (isset($_POST['major'])) {
                            
                        } elseif(isset($_POST['menor']))){
                            
                        } elseif(isset($_POST['igual']))){
                            
                        }

                    }
                ?>
            </div>
            <button type="submit" name="major" >ES MAJOR</button>
            <button type="submit" name="menor" >ES MENOR</button>
            <button type="submit" name="igual" >ES EL NUMERO</button>
        </form>

    </div>
</body>
</html>