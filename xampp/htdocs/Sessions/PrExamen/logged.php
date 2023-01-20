<html>
    <head>
        <title>Logged</title>
        <style>
            body{background-color: blue;}
            p{font: 25px;display:block;}
        </style>

        <?php
            session_start();
            var_export($_SESSION);
            if(!isset($_SESSION["sUsuario"])){
                echo header("Location:login.php");
            }
        ?>
    </head>
    <body>
        <p>Has accedido, <?php echo $_SESSION["sUsuario"]." con contraseña: ".$_SESSION["sPassword"] ?></p>
    </body>
</html>