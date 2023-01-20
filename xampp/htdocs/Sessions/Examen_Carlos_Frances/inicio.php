<html>
<head>
    <title></title>
    <style>
        table{display: inline-block; margin:30px;border:2px;}
    </style>
    <?php 
        session_start();
        $numerosSacados=array();
        $bolasSacadas=array();
        $aciertos1=array();
        $bola;
        function obtenerNumero($a){
            while(true){
                $aleatorio=rand(1,69);
                if (!in_array($aleatorio,$a)){
                    return $aleatorio;
                }
            }
        }
        if(isset($_SESSION["bolasSacadas"])){
            //$aciertos1=$_SESSION["aciertos1"];
            $bolasSacadas=$_SESSION["bolasSacadas"];
            // esta linea evita que se caiga el juego al sobrepasar el numero de bolas
            if(count($bolasSacadas) == 69){session_destroy();}
            $bola=obtenerNumero($bolasSacadas);
            $carton1 = $_SESSION["carton1"];
            $carton2 = $_SESSION["carton2"];
            array_push($bolasSacadas,$bola);
            //contar el bingo
            $contBingo=0;
            for ($i=0; $i < count($carton1); $i++) { 
                if(in_array($carton1[$i],$bolasSacadas)){$contBingo++;}
            }
            if($contBingo == 12){echo "Ha ganado el jugador 1!!";$boton=false;$_SESSION["boton"]=$boton;}
            $contBingo=0;
            for ($i=0; $i < count($carton2); $i++) { 
                if(in_array($carton2[$i],$bolasSacadas)){$contBingo++;}
            }
            if($contBingo == 12){echo "Ha ganado el jugador 2!!";$boton=false;$_SESSION["boton"]=$boton;}
        }
    ?>
</head>
<body>
    <form action="inicio.php" method="POST">
        <input type="submit" value="Sacar bola" id="boton" 
        <?php 
            if(isset($_SESSION["boton"]))
            {
                if($_SESSION["boton"]== false) {echo "disabled";}           
            }
        ?>
        >
    </form>
    <div>
    <?php 
        if(isset($_SESSION["bolasSacadas"])){
            $bolas=$_SESSION["bolasSacadas"];
            $cont=0;
            foreach ($bolas as $numero) {
                echo $numero."&nbsp&nbsp&nbsp&nbsp";
                if($cont % 10 == 0){echo "<br/>";}
                $cont++;
            }
        }
    ?>
    </div>
    <div style="position: absolute; top: 300px; left: 300px;">
        <table>
            
            <?php 
                if(!isset($_SESSION["carton1"])){
                    for ($i=0; $i < 3; $i++) { 
                    echo "<tr>";
                    for ($j=0; $j < 4; $j++) { 
                        $num=obtenerNumero($numerosSacados);
                        echo "<td>".$num."</td>";
                        array_push($numerosSacados,$num);
                    }
                    echo "</tr>";
                    }
                    $carton1=$numerosSacados;
                    $numerosSacados=[];
                    $_SESSION["carton1"]=$carton1;

                }else{
                    $con=0;
                    $carton1=$_SESSION["carton1"];
                    for ($i=0; $i < 3; $i++) { 
                        echo "<tr>";
                        for ($j=0; $j < 4; $j++) { 
                            if(!in_array($carton1[$con],$bolasSacadas)){
                                echo "<td>".$carton1[$con]."</td>";
                            }else{
                                echo "<td style='background-color:blue;'>".$carton1[$con]."</td>";
                                
                            }
                                
                            $con++;
                        }
                        echo "</tr>";
                        }
                }
            ?>
        </table>
        <table>
            <?php 
                if(!isset($_SESSION["carton2"])){
                    for ($i=0; $i < 3; $i++) { 
                    echo "<tr>";
                    for ($j=0; $j < 4; $j++) { 
                        $num=obtenerNumero($numerosSacados);
                        echo "<td>".$num."</td>";
                        array_push($numerosSacados,$num);
                    }
                    echo "</tr>";                   
                    } 
                    $carton2=$numerosSacados;
                    $numerosSacados=[];
                    $_SESSION["carton2"]=$carton2;
                }else{
                    $con1=0;
                    $carton2=$_SESSION["carton2"];
                    for ($i=0; $i < 3; $i++) { 
                        echo "<tr>";
                        for ($j=0; $j < 4; $j++) { 
                            if(!in_array($carton2[$con1],$bolasSacadas)){
                                echo "<td>".$carton2[$con1]."</td>";
                            }else{
                                echo "<td style='background-color:blue;'>".$carton2[$con1]."</td>";
                            }
                            $con1++;
                        }
                        echo "</tr>";
                    }
                    $_SESSION["bolasSacadas"]=$bolasSacadas;
                }
            ?>
        </table>
    </div>  
</body>
</html>