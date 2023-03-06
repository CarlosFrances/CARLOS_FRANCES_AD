<html>

<head>
    <title>Dynamic Wordle!</title>
</head>

<body background="./assets/background_juego_2.jpg" style="background-size:cover;background-repeat:no-repeat;">

    <?php

    require_once("dbutils.php");

    $conDB = conectarDB();

    $palabras = execute_query($conDB, "select * from palabras");

    $palabra = palabraAleatoria($palabras);

    var_export($palabra);



    ?>

</body>



</html>