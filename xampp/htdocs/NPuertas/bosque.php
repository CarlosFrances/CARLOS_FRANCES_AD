<html>
<head>
    <style>
        body{background-image:url('resources/forest.jpg');
            background-size:cover;}
        div{position:absolute;top:340px; left:20%;}
        img{height:350px;width:220px;}
        h1{position:absolute;top:50px;left:40%}
    </style>
    <?php 
        session_start();
        $vidas = $_SESSION['vidas'];
        $rand = rand(2,4);  
        $randMuerte = rand(0,$rand-1);
        $randVida;
        do{
            $randVida=rand(0,$rand-1);
        }while($randVida==$randMuerte);
    ?>
</head>
<body> 
<h1><font color="green">CAPITULO 2: EL BOSQUE</font></h1>
    <form method="POST" id="form">
        <div>
            <?php 
                echo $vidas;
                for($i=0;$i < $rand ;$i++){
                    if($randMuerte==$i){
                        echo "<img onclick='go()' src='./resources/forestDoor.jpg'>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                    }elseif($randVida==$i){ 
                        echo "<img onclick='go2()' src='./resources/forestDoor.jpg'>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                    }else{
                        echo "<img onclick='go3()' src='./resources/forestDoor.jpg'>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                    }
                }
            ?>
        </div>
    </form>
    <script>
        function go(){
            document.getElementById("form").action="muerte.php";
            document.getElementById("form").submit();
        }
        function go2(){
            document.getElementById("form").action="cueva.php";
            document.getElementById("form").submit();
        }
        function go3(){
            document.getElementById("form").action="recibidor.php";
            document.getElementById("form").submit();
        }
    </script>
</body>
</html>