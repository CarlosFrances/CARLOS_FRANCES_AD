<!-- http://localhost/Sessions/login.php -->
<?php
    session_start();
    var_export($_SESSION);
    var_export($_POST);
    $loginOK = false;

    if(isset($_POST["sNombre"]))
    { 
        if($_POST["sNombre"]=="afs")
        {
            //Peticion a base de datos del password de afs
            $passDB="1234";//getPassFromAlumno($_POST["sNombre"])
            if($passDB==$_POST["sPassword"])
            {
                $loginOK=true;
                $_SESSION["user"]=$_POST["sNombre"];
                $_SESSION["pass"]=$_POST["sPassword"];
                echo header("Location:work01.php");
            }
        }
    }
?>
<html>
<body>
    <form method="post" action="login.php">
        <label>USER:</label><input type="text" name="sNombre"/>
        <br/>
        <label>PASS:</label><input type="password" name="sPassword"/>
        <br/>
        <input type="submit" value="Login"/>
        <br/>
        <label>
            <?php 
                if(isset($_POST["sNombre"]))
                {
                    echo (($loginOK)?"ESTÁS DENTRO!!":"ERROR DE CREDENCIALES");
                }
        ?>
        </label>
    </form>
</body>
</html>