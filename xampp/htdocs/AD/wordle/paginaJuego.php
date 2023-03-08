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

<body background="./assets/background_juego_2.jpg" style="background-size:cover;background-repeat:no-repeat;">

    <?php

    require_once("dbutils.php");

    $conDB = conectarDB();

    $palabras = execute_query($conDB, "select * from palabras");

    $palabra = palabraAleatoria($palabras);
    $palabraPartida = str_split($palabra);
    $contador = 0;

    echo "<center style='margin-top:15%;'><form method='POST'>";
    foreach ($palabraPartida as $character) {
        echo "<input maxlength='1' id='input_" . $contador . "' type='text' class='cajita'></div>";
        $contador++;
    }

    echo "<button class='btn btn-info'>GO</button></form></center>";

    ?>

</body>



</html>