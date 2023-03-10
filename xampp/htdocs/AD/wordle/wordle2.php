<html>

<head>
    <title>Dynamic Wordle!</title>

    <link href="https://fonts.cdnfonts.com/css/common-pixel" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="estilos.css">
</head>
<?php
$palabra = "guapo";
$aInputs = array();


if (isset($_POST["boton"])) {
    session_start();
    $_SESSION["intentos"]++;
    //$_SESSION["historial"][$_SESSION["intentos"]] = ;

    var_export($_POST);

    for ($i = 0; $i < strlen($palabra); $i++) {
        $_SESSION["historial"][$_SESSION["intentos"]] . array_push($_POST["letra" . $i]);
    }

    var_export($historial);


    for ($i = 0; $i < strlen($palabra); $i++) {
        if ($palabra[$i] == $_POST["letra" . $i]) {
            $aInputs[$i] = "#4bff00dd";
        } else if (
            $_POST["letra" . $i] == $palabra[0] || $_POST["letra" . $i] == $palabra[1] || $_POST["letra" . $i] == $palabra[2]
            || $_POST["letra" . $i] == $palabra[3] || $_POST["letra" . $i] == $palabra[4]
        ) {
            $aInputs[$i] = "#fff700dd";
        } else {
            $aInputs[$i] = "#ff0000dd";
        }
    }

} else // Primera entrada a la página
{
    session_start();
    $_SESSION["historial"] = array();
    $_SESSION["intentos"] = 0;
}
?>

<body background="./assets/background_juego_2.jpg" style="background-size:cover;background-repeat:no-repeat;">
    <form action="wordle.php" method="post">
        <input type="hidden" name="intentosPost" value="<?php echo $_SESSION["intentos"]; ?>" />
        <label>Número de intentos:
            <?php echo $_SESSION["intentos"]; ?>
        </label><br />

        <center>
            <img src="./assets/WURDLE.png" style='display:block;margin-top:5%;margin-bottom:3%;' />
            <?php
            for ($i = 0; $i < $_SESSION["intentos"]; $i++) {

                /*if ($intentos > 0) {
                for ($i = 0; $i < strlen($palabra); $i++) {
                $color = (isset($aInputs[$i])) ? $aInputs[$i] : "white";
                $valor = (isset($_POST["letra" . $i])) ? $_POST["letra" . $i] : "";
                echo '<div class="row"><input type="text" maxlength="1" class="cajita" name="letra' . $i . '" value="' . $valor . '" style="background-color:' . $color . '"/></div>';
                }
                }*/
                //echo "<label>" . $_POST["h" . $i] . "</label><br/>";
            

            }
            for ($i = 0; $i < $_SESSION["intentos"]; $i++) {
                if ($i == $_SESSION["intentos"] - 1) {
                    echo '<input type="hidden" name= "h' . $i . '" value= "' . $_POST["letra0"] . $_POST["letra1"] . $_POST["letra2"] . $_POST["letra3"] . $_POST["letra4"] . '"/>';
                } else {

                    echo '<input type="hidden" name= "h' . $i . '" value= ' . $_POST["h" . $i] . ' />';
                }
            }
            for ($i = 0; $i < strlen($palabra); $i++) {
                $color = (isset($aInputs[$i])) ? $aInputs[$i] : "white";
                $valor = (isset($_POST["letra" . $i])) ? $_POST["letra" . $i] : "";
                echo '<input type="text" maxlength="1" class="cajita" id="input' . $i . '" name="letra' . $i . '" value="' . $valor . '" style="background-color:' . $color . '"/>';
                echo '<script>let input' . $i . '=document.querySelector("#input' . $i . '");</script>';
            }
            echo "<script>input0.focus()</script>";
            echo "<button class='btn btn-info' name='boton' id='input" . strlen($palabra) . "'>GO</button>";

            for ($i = 0; $i < strlen($palabra); $i++) {
                echo '<script>
                    input' . $i . '.addEventListener("input", () => {
                        if (input' . $i . '.value.length > 0) {
                        input' . strval($i + 1) . '.focus();
                        }
                    });
                </script>';
            }
            ?>
            <!-- <input type="text" name="letra0"/> -->
    </form>
    </center>
    </form>
</body>

</html>