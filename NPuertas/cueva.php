<html>
<head>
    <style>
        body{background-image:url('resources/cave.jpg');
            background-size:cover;}
        div{position:absolute;top:400px; left:17%;}
        img{height:250px;width:150px;}
        h1{position:absolute;top:50px;left:40%}
    </style>
    <?php 
        $rand = rand(3,6);  
        $randMuerte = rand(0,$rand-1);
        $randVida;
        do{
            $randVida=rand(0,$rand-1);
        }while($randVida==$randMuerte);
    ?>
</head>
<body> 
    <h1><font color="brown">CAPITULO 3: LA CUEVA</font></h1>
    <form method="POST" id="form">
        <div>
            <?php 
                for($i=0;$i < $rand ;$i++){
                    if($randMuerte==$i){
                        echo "<img onclick='go()' src='./resources/caveDoor.jpg'>
                        &nbsp;&nbsp;&nbsp;&nbsp;";
                    }elseif($randVida==$i){ 
                        echo "<img onclick='go2()' src='./resources/caveDoor.jpg'>
                        &nbsp;&nbsp;&nbsp;&nbsp;";
                    }else{
                        echo "<img onclick='go3()' src='./resources/caveDoor.jpg'>
                        &nbsp;&nbsp;&nbsp;&nbsp;";
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
            document.getElementById("form").action="infierno.php";
            document.getElementById("form").submit();
        }
        function go3(){
            document.getElementById("form").action="bosque.php";
            document.getElementById("form").submit();
        }
    </script>
</body>
</html>