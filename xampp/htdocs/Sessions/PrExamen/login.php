<html>
    <head>
        <title>Login</title>
        <style>
            body{background-color: #00f; color: white;}
            p{font: 25px;display: inline-block;}
            div{background-color: #05f;border:5px solid;border-color: #03f;border-radius: 10px;position: absolute;
                 top:50%;left:50%;
                 -ms-transform: translateX(-50%) translateY(-50%);
                -webkit-transform: translate(-50%,-50%);
                transform: translate(-50%,-50%);
                padding:25px;}
        </style>
        <?php         
            function pasarDatos($usu , $pass){
                $_SESSION["sUsuario"] = $usu;
                $_SESSION["sPassword"] = $pass;
                echo header("Location:logged.php");
            }
            session_start();  
            
            var_export($_SESSION);
            var_export($_POST);
            if(isset($_POST["usuario"]) && isset($_POST["password"])){
                if($_POST["usuario"] == "carlos" && $_POST["password"] == "123"){
                    pasarDatos($_POST["usuario"],$_POST["password"]);
                }
                else{echo "<br/><p>Datos incorrectos</p>";}
            }
        ?>
    </head>
<body>
    <div>
        <form method="POST" action="login.php">
            <p>USER:</p>
            <input type="text" name="usuario">
            <br/>
            <p>PASSWORD:</p>
            <input type="text" name="password">
            <br/>
            <button>Ingresar</button>
        </form>
    </div>
</body>
</html>