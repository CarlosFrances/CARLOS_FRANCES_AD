<html>
<head>
    <title>pantalla 2</title>
</head>
<body>
    <ul>
    <?php
        $numeros=$_POST["numeros"];
        sort($numeros);
        $media=0;
        $maximo=$numeros[sizeof($numeros)-1];
        $minimo=$numeros[0];
        foreach($numeros as $numero){
            $media+=$numero;
            echo "<li>".$numero."</li>";
        }
        $media/=sizeof($numeros);
    ?>
    </ul>  
    <p>Media: <?php echo $media ?></p>
    <p>Mínimo:  <?php echo $minimo ?></p>
    <p>Máximo:  <?php echo $maximo ?></p>
</body>
</html>