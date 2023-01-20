<?php

$numeroJugadores = 1;

require("complementos/utiles.php");
require("complementos/obtenerJugadorActual.php"); //NO IMPLEMENTADO
require("complementos/creacionCartas.php");

?>
<html>
    <head>
        <!-- DATOS -->
        <title>Turno de <?php echo $jugadorActual ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="google" content="notranslate">

        <!-- ESTILOS CSS -->
        <link type="text/css" rel="stylesheet" href="styles/main.css">
        <link type="text/css" rel="stylesheet" href="styles/mazos.css">
        <link type="text/css" rel="stylesheet" href="styles/carta.css">
        <link type="text/css" rel="stylesheet" href="styles/lineaTiempo.css">
        <link type="text/css" rel="stylesheet" href="styles/botonConfirmar.css">

        <!-- CÓDIGOS JS -->
        <script type="text/javascript" src="scripts/main.js"></script>
        <script type="text/javascript" src="scripts/DragDrop.js"></script>
    </head>
    <body>
        <!-- <font color="white">
            <?php
                //var_export($_POST);
            ?>
        </font> -->
        
            <form class="contenedor" action="index.php" method="POST">
            <div id="mazoTiempo">
                <?php

                    if(existir("cartasTiempo")){
                        $cartasTiempo = array();
                        for($i=0; $i<count(getDato("cartasTiempo")); $i++){
                            array_push($cartasTiempo, explode(",", getDato("cartasTiempo")[$i])); 
                        }
                        
                        foreach($cartasTiempo as $carta){
                            //Imprimirá una carta, indicando el mazo actual
                            echo devolverCarta($carta, $mazo="mazoTiempo");
                        }

                    } else {
                        echo generarCartaAleatoria($clickable=false, "cartasTiempo[]");
                    }

                ?>

            </div>
            <div id="mazoUsuario">
                <?php

                    //Si el usuario no tiene cartas
                    if(existir("cartasUsuario")){
                        //1. Crea un array de las cartas del usuario
                        $cartasUsuario = array();
                        
                        for($i=0; $i<count(getDato("cartasUsuario")); $i++){
                            array_push($cartasUsuario, explode(",", getDato("cartasUsuario")[$i])); 
                        }

                        foreach($cartasUsuario as $carta){
                            echo devolverCarta($carta, $mazo="mazoUsuario");
                        }
                    } else {
                        //Se reparten por primera vez
                        for($i=0; $i<3; $i++){
                            echo generarCartaAleatoria($clickable=true, "cartasUsuario[]");
                        }
                    }

                    ?>
            </div>
            <button class="botonConfirmar">Finalizar turno</button>
            </form>
            <hr id="lineaTiempo">
            <div class="botonesMovimiento">
                <button class="botonMovimiento" onclick="irIzquierda()">&larr;</button>
                <button class="botonMovimiento" onclick="irDerecha()">&rarr;</button>
            </div>
            <p class="inicioFin" style="left:-20px">Inicio</p>
            <p class="inicioFin" style="right:0">Fin</p>
            <style>
                
                .inicioFin {
                    position: absolute;
                    color: #FFFFFF;
                    top: 39%;
                    transform: rotate(90deg);
                    /* transform: translate(10px, 10px); */
                    font: 50px Arial;
                }

            </style>
    </body>
</html>