<html>
    <head>
        <title>Resultado</title>
    </head>
    <body>
        <?php
            if(!isset($_POST["numero1"]) || !isset($_POST["numero2"]) || !isset($_POST["operacion"])){
                echo "<p>Faltan valores... </p></body></html>";
                return;
            }

            //Capturar valores
            var_export($_POST);
            $numero1=$_POST["numero1"];
            $numero2=$_POST["numero2"];
            $operacion=$_POST["operacion"];

            //Verificar tipo de operacion
            $resultado=0;
            if($operacion=="sumar"){
                $resultado=$numero1+$numero2;
            }
            else if($operacion=="restar"){
                $resultado=$numero1-$numero2;
            }
            else if($operacion=="multiplicar"){
                $resultado=$numero1 * $numero2;
            }
            else if($operacion=="dividir"){
                $resultado=$numero1 / $numero2;
            }
        ?>
</body>
<h1>Resultado: <?php echo $resultado ?></h1>
<form action="calculadoraJuanito.php">
    <button type="submit">VOLVER</button>
</form>
</html>