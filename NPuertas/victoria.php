<html>
<head>
</head>
<style>
        body{background-image:url('resources/victoria.jpg');
            background-size:cover;}
        div{position:absolute;top:350px; left:0%;}
        img.animated-gif{
            width: 300px;
            height: 300px;
        }
    </style>
<body>
    <h1 style="text-align:center"><font color="#0000cd">ENHORABUENA</font></h1>
    <form method="POST" id="form">
        <div>
            <?php
                echo "<p align='center'><font color='#0000cd' size='5'>VOLVER A JUGAR</font></p>";
                echo "<img onclick='go()' class='animated-gif' src='resources/portal.gif'>";
            ?>
        </div>
    </form>
    <script>
        function go(){
            document.getElementById("form").action="recibidor.php";
            document.getElementById("form").submit();
        }
    </script>
</body>
</html>