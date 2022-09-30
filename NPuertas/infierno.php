<html>
<head>
    <style>
        body{background-image:url('resources/hell.jpg');
            background-size:cover;}
        div{display:inline; position:absolute;top:400px; left:2%;}
        img{height:200px;width:100px;}
        h1{position:absolute;top:50px;left:40%}
    </style>
    <?php 
        $rand = rand(6,12);  
        $randMuerte = rand(0,$rand-1);
        $randVida;
        do{
            $randVida=rand(0,$rand-1);
        }while($randVida==$randMuerte);
    ?>
</head>
<body> 
<h1><font color="red">CAPITULO 4: EL INFIERNO</font></h1>
    <form method="POST" id="form">
        <div>
            <?php 
                for($i=0;$i < $rand ;$i++){
                    if($randMuerte==$i){
                        echo "<img onclick='go()' src='./resources/hellDoor.jpg'>&nbsp;";
                    }elseif($randVida==$i){ 
                        echo "<img onclick='go2()' src='./resources/hellDoor.jpg'>&nbsp;";
                    }else{
                        echo "<img onclick='go3()' src='./resources/hellDoor.jpg'>&nbsp;";
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
            document.getElementById("form").action="victoria.php";
            document.getElementById("form").submit();
        }
        function go3(){
            document.getElementById("form").action="cueva.php";
            document.getElementById("form").submit();
        }
    </script>
</body>
</html>