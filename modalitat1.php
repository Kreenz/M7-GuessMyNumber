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


                        
                        if(!empty($_SESSION["max"])){
                            echo "max";
                            $userPost = "";
                            if(isset($_POST["rang"])){
                                $userPost = $_POST["rang"];
                            } else {
                                $userPost = false;
                            }

                            echo $userPost;

                            if(isset($_POST["facil"]) || isset($_POST["normal"]) || isset($_POST["dificil"])){
                                echo "Ja hi ha un numero iniciat.";
                            } else {
                                guessType($userPost);
                                echo "<span> El numero secret es " . $_SESSION["val"] . "</span>";
                            }
                            
                        } else {
                            echo "entrada";
                            $_SESSION["min"] = 0;
                            if (isset($_POST['facil'])) {
                                echo "facil";
                                $_SESSION["max"] = 10;
                            } elseif(isset($_POST['normal'])){
                                echo "normal";
                                $_SESSION["max"] = 50;
                            } elseif(isset($_POST['dificil'])){
                                echo "dificil";
                                $_SESSION["max"] = 100;
                            }
                        }


                    }

                    function guessType($operator){
                        if($operator){
                            $_SESSION["val"] = guessNumber($_SESSION["min"], $_SESSION["max"]);
                        } else {
                            if($operator == "+"){
                                $_SESSION["min"] = $_SESSION["val"];
                                $_SESSION["val"] = guessNumber($_SESSION["min"], $_SESSION["max"]); 
                            } elseif($operator == "-") {
                                $_SESSION["max"] = $_SESSION["val"]; 
                                $_SESSION["val"] = guessNumber($_SESSION["min"], $_SESSION["max"]);
                            } else {
                                unset($_SESSION["max"]);
                            }

                            if($_SESSION["val"] == $_SESSION["max"] && $_SESSION["val"] == $_SESSION["min"]) {
                                unset($_SESSION["max"]);   
                            }
                        }

                    }

                    function guessNumber($min, $max){
                        return ($max - $min / 2);
                    }
                ?>
            </div>
            <button type="submit" name="rang" value="+">ES MAJOR</button>
            <button type="submit" name="rang" value="-">ES MENOR</button>
            <button type="submit" name="rang" value="=">ES EL NUMERO</button>
        </form>

    </div>
</body>
</html>