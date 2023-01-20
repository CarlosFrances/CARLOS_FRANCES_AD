<!-- http://localhost/Proyecto1/Minas/MinasDAlberto.php -->
<html>
<head>
    <?php 
        var_export($_POST);
        $dimension=3;
    ?>
    <style>
        input[type=button]{width:100px;height:100px;background:#00aaff;margin:7px;border-radius:100px; border:none}
        div{position:absolute;top:170px;left:470px;}
    </style>
    <script>
        function go(x, y){
            alert(x +" , "+ y);
            //document.getElementById("lasthit1").value="i"+x+y;
            var idBanValue=document.getElementById("idBandera").value;
            if(idBanValue==("i"+x+y)){
                alert("Enhorabuena");
            }
            else{
                document.getElementById("form1").submit();
            }
        }
    </script>
</head>
<body>

<div>
    <form method="post" action="MinasDAlberto.php" id="form1">
        <input type="hidden" name="lasthit" id="lasthit1"/>
        <?php 
            //Primera vez que carga la pagina
            if(count($_POST) == 0){
                //Se genera la posicion en i y j de la mina y se crea un hidden con su valor
                $x=rand(0,$dimension-1);
                $y=rand(0,$dimension-1);
                echo '<input type="hidden" id="idBandera" name="bandera" value="i'.$x.$y.'"/>';
            }

            //Si no es la primera vez, se guarda el valor de la bandera en un hidden
            else{

                echo '<input type="hidden" id="idBandera" name="bandera" value="'.$_POST['bandera'].'"/>';
            }

            //Creacion de la matriz
            for($i=0;$i<$dimension;$i++){
                for($j=0;$j<$dimension;$j++){
                    echo "<input type='button' id='i".$i.$j."' name='i".$i.$j."' onclick='go(".$i.",".$j."); this.value='1';'/>";
                }
                echo '<br/>';
            }
        ?>
    </form>
        </div>
</body>
</html>