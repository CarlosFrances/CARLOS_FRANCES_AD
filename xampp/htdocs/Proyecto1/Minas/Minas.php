<!-- http://localhost/Proyecto1/Minas/Minas.php -->
<html>
<head>
    <?php 
        $alto=3;
        $xmina=rand(0,$alto-1);
        $ymina=rand(0,$alto-1);
        /*$intentos = 0;
			if(isset($_POST["intentos"])){
				$intentos = $_POST["intentos"];
				$intentos++;
			}
            echo "<input type='hidden' name='intentos' value='$intentos'/>";*/
    ?>
    <style>
        td{background-color:blue;}
        input{background-color:teal;height:100px;width:100px;}
        table{position:absolute;left:450px;top:150px;border-radius:10px;border-color:blue;}
        td{border-radius:10px;}
        input[type=button]{border-radius:10px;border:none;}
    </style>
</head>
<body>

    <form action="Minas.php" method="POST">
        <table border="5" align="center">
            <?php 
                for($i=0;$i < $alto;$i++){
                    echo "<tr>";
                    for($j=0;$j < $alto;$j++){
                        if($i==$ymina && $j==$xmina){
                            echo "<td width='120px' height='120px' align='center'><input type='button' style='background-color:#3399ff' onclick='muerte($i,$j);this.disabled=true;' id='casilla$i$j'></td>";
                        }
                        else{echo "<td width='120px' height='120px' align='center'><input type='button' style='background-color:#3399ff' onclick='this.disabled=true;vida($i,$j)' id='casilla$i$j'></td>";}
                    }
                    echo "</tr>";   
                }
            ?>
        </table>
    </form>

    <script>
        function muerte(i,j){
            for(let i=0; i<9; i++){
                document.getElementsByTagName("input")[i].disabled = true;
                document.getElementsByTagName("input")[i].style.backgroundColor ="#32CD32";
            }
            document.getElementById("casilla"+i+j).style.backgroundColor="#ff5050";
            
        }

        function vida(i,j){
            document.getElementById("casilla"+i+j).style.backgroundColor="#32CD32";
        }
    </script>
			

</body>
</html>