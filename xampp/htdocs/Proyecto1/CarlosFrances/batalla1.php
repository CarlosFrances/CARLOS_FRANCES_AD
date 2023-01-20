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
        $chofipower=rand(1,3);
        $numjugador=$_POST['numjugador'];
        $opcion=$_POST['opcion'];
        $accion;

        $vicdef=false;
        if($opcion == "mayor" ){
            if($numjugador > $chofipower) $vicdef=true;
        }
        else if($opcion == "igual" ){
            if($numjugador == $chofipower) $vicdef=true;
        }
        else if($opcion == "menor" ){
            if($numjugador < $chofipower) $vicdef=true;
        }

    ?>
</head>
<body>
    <div>
        <h1>CHOFI SACA: <?php echo $chofipower ?></h1>
        <p><?php  
            if($vicdef){
                echo "<b><font color='blue'>ENHORABUENA DE LA BUENA!!!!</font></b>";
                $accion="chofo.php";
            } 
            else{
                echo "<b><font color='red'>PERECES ANTE EL PODER DE CHOFI</font></b>";
                $accion="chofi.php";
            }
        ?></p>
        <!-- DESHABILITAR BOTON -->
        <form method="post" action="<?php echo "$accion"; ?>">
            <?php
                if($vicdef){ 
                    echo '<input type="submit" value="Mueres" id="bmuerte" disabled="true"/>
                    <input type="submit" value="Vives" id="bvida"/>';
                }
                else{
                    echo '<input type="submit" value="Mueres" id="bmuerte"/>
                    <input type="submit" value="Vives" id="bvida"  disabled="true"/>';
                }
            ?>
            
        </form>
    </div>
</body>
</html>