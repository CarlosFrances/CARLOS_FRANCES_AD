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
$aInputs = array();


if (isset($_POST["boton"])) {
    session_start();

    $_SESSION["primeraVez"] = false;

    for ($i = 0; $i < strlen($_SESSION["palabra2"]); $i++) {
        $_SESSION["historial"][$_SESSION["intentos"]][$i] = $_POST["letra" . strval($i) . ""];

    }

    $_SESSION["intentos"]++;

    for ($i = 0; $i < strlen($_SESSION["palabra2"]); $i++) {
        if ($_SESSION["palabra2"][$i] == $_POST["letra" . $i]) {
            $aInputs[$i] = "#0000ffdd";
        }
    }

} else {
    session_start();
    require_once("dbutils.php");

    $conDB = conectarDB();
    $palabras = execute_query($conDB, "select * from palabras");

    $palabra = palabraAleatoria($palabras);
    $_SESSION["primeraVez"] = true;
    $_SESSION["historial"] = array();
    $_SESSION["intentos"] = 0;
    $_SESSION["palabra2"] = $palabra;
    $_SESSION["caracteresAcertados"] = array();
}
?>

<body background="./assets/background_juego_2.jpg" style="background-size:cover;background-repeat:no-repeat;">
    <form action="wurdle.php" method="post">
        <center>
            <img src="./assets/WURDLE.png" style='display:block;margin-top:5%;margin-bottom:3%;' />
            <?php

            // Sacar por pantalla todos los resultados anteriores
            if ($_SESSION["intentos"] > 0) {
                for ($i = 0; $i < strlen($_SESSION["palabra2"]); $i++) {
                    $_SESSION["palabra"] = $_SESSION["palabra"] . $_POST["letra" . $i];
                }
                if ($_SESSION["palabra"] == $_SESSION["palabra2"]) {
                    echo "<h1 style='font-family:Common Pixel;'>ENHORABUENA DE LA BUENA!!! la palabra era " . $_SESSION["palabra2"] . "</h1>";
                    echo "<h2 style='margin-top:4%;font-family:Common Pixel'>INTENTOS: " . strval($_SESSION["intentos"]) . "</h2> ";
                    echo "<a href='wurdle.php'<button style='font-family:Common Pixel;margin-top:4%;' class='btn btn-success'>VOLVER A JUGAR</button></div></a>";
                    exit;
                }
                $_SESSION["palabra"] = "";
                $_SESSION["caracteresAcertados"] = array();
                for ($i = 0; $i < $_SESSION["intentos"]; $i++) {
                    echo "<div class='row' style='margin-top:2%;display:block;'>";
                    for ($j = 0; $j < strlen($_SESSION["palabra2"]); $j++) {

                        $color = "#ff0000dd";

                        $letraActual = $_SESSION["historial"][$i][strval($j)];

                        $key = array_search($letraActual, str_split($_SESSION["palabra2"]));

                        if ($_SESSION["palabra2"][$j] == $_SESSION["historial"][$i][$j]) {
                            $color = "#0000ffdd";
                            array_push($_SESSION["caracteresAcertados"], $j);
                        } else if (
                            str_contains(
                                $_SESSION["palabra2"],
                                $_SESSION["historial"][$i][$j]
                            )
                        ) {
                            $repetido = false;
                            for ($k = 0; $k < count($_SESSION["caracteresAcertados"]); $k++) {
                                if ($_SESSION["caracteresAcertados"][$k] === $key) {
                                    $repetido = true;
                                    break;
                                }
                            }
                            if (!$repetido) {
                                $color = "#ffff00dd";
                            }
                        }
                        /*if ($key !== false && $key === array_search($letraActual, str_split($palabra))) {
                        $color = "#0000ffdd";
                        array_push($_SESSION["caracteresAcertados"], $j);
                        } else if (
                        $key !== false
                        ) {
                        $repetido = false;
                        for ($k = 0; $k < count($_SESSION["caracteresAcertados"]); $k++) {
                        if ($_SESSION["caracteresAcertados"][$k] === $key) {
                        $repetido = true;
                        break;
                        }
                        }
                        if (!$repetido) {
                        $color = "#ffff00dd";
                        }
                        }*/

                        echo '<input type="text" style="background-color:' . $color . '" readonly maxlength="1" class="cajita" value="' . $_SESSION["historial"][$i][strval($j)] . '"/>';
                    }
                    echo "</div>";
                }
            }

            echo "<div style='margin-top:2%;'>";
            for ($i = 0; $i < strlen($_SESSION["palabra2"]); $i++) {
                $color = (isset($aInputs[$i])) ? $aInputs[$i] : "white";
                $valor = (isset($_POST["letra" . $i])) ? $_POST["letra" . $i] : "";
                if (in_array($i, $_SESSION["caracteresAcertados"])) {
                    echo '<input type="text" autocomplete="off" maxlength="1" class="cajita" id="input' . $i . '" name="letra' . $i . '" value="' . $valor . '" style="background-color:' . $color . '"/>';
                    echo '<script>let input' . $i . '=document.querySelector("#input' . $i . '");</script>';
                } else {
                    echo '<input type="text"  autocomplete="off" maxlength="1" class="cajita" id="input' . $i . '" name="letra' . $i . '"style="background-color:' . $color . '"/>';
                    echo '<script>let input' . $i . '=document.querySelector("#input' . $i . '");</script>';
                }

            }
            echo "</div><script>input0.focus()</script>";
            echo "<div style='margin-top:5%;display:inline-block;'><h1 style='float:right;font-family:Common Pixel;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;INTENTOS: " . $_SESSION["intentos"] . "</h1>";
            echo "<button style='float:right;font-family:Common Pixel;' class='btn btn-primary' name='boton' id='input" . strlen($_SESSION["palabra2"]) . "'>GO</button></div>";


            for ($i = 0; $i < strlen($_SESSION["palabra2"]); $i++) {
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