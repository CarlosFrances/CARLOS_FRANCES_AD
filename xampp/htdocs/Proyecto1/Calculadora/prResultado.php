<html>
<head>
    <?php
        $resultado;
        $num1=$_POST['num1'];
        $num2=$_POST['num2'];
        $operacion=$_POST['operacion'];
        var_export($_POST);
        if($operacion == "suma"){
            $resultado=$num1+$num2;
        }
        else if($operacion == "resta"){
            $resultado=$num1-$num2;
        }
        else if($operacion == "multiplicacion"){
            $resultado=$num1*$num2;
        }
        else if($operacion == "division"){
            $resultado=$num1/$num2;
        }
    ?>
</head>
<body>
    <h1>Resultado: <?php echo $resultado ?></h1>
</body>
</html>