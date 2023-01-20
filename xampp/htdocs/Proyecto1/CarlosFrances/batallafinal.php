<html>
<head>
    <style>
        div{display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            display:block;}
    </style>
    <?php 
        $chofopower=rand(1,10);
        $numjugador=$_POST['numjugador'];
        $opcion1=$_POST['opcion1'];
        $opcion2=$_POST['opcion2'];
        $accion;

        $vicdef=false;
        if($opcion1 == "diferencia de 1" || $opcion2 == "diferencia de 1"){
            if($numjugador == $chofopower-1 || $numjugador == $chofopower+1) $vicdef=true;
        }
        if($opcion1 == "igual" || $opcion2 == "igual" ){
            if($numjugador == $chofopower) $vicdef=true;
        }
        if($opcion1 == "diferencia de 2" || $opcion2 == "diferencia de 2"){
            if($numjugador == $chofopower-2 || $numjugador == $chofopower+2) $vicdef=true;
        }
    ?>
</head>
<body>
    <div>
        <h1>CHOFO SACA: <?php echo $chofopower ?></h1>
        <p><?php  
            if($vicdef){
                echo "<b><font color='blue'>ENHORABUENA DE LA BUENA!!!!</font></b>";
            } 
            else{
                echo "<b><font color='red'>PERECES ANTE EL TODOPODEROSO CHOFO</font></b>";
            }
        ?></p>
    </div>
</body>
</html>