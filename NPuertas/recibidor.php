<html>
<head>
    <style>
        body{background-image:url('resources/street.jpg');
            background-size:cover;}
        div{position:absolute;top:330px; left:40%;}
        h1{position:absolute;top:50px;left:40%}
    </style>
    <?php 
        session_start();
        $vidas=$_SESSION['vidas'] = 6;
        $rand = rand(0,1)
    ?>
</head>
<body>
    <h1><font color="dark-gray">CAPITULO 1: LA CIUDAD</font></h1>
    <form method="POST" id="form">
    <div>
        <?php 
            for($i=0;$i<2;$i++){
                if($rand==$i){
                    echo "<img onclick='go()' src='./resources/hallDoor.jpg'>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                }else{ 
                    echo "<img onclick='go2()' src='./resources/hallDoor.jpg'>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                }
            }
        ?>
    </div>
    
    </form>
    <script>

        function go(){
            document.getElementById("form").action="bosque.php";
            document.getElementById("form").submit();
        }
        function go2(){
            document.getElementById("form").action="bosque.php";
            document.getElementById("form").submit();
        }
    </script>

</body>
</html>