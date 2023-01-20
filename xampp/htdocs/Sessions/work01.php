<?php
    session_start();
    var_export($_SESSION);
    if(isset($_SESSION["user"]) && isset($_SESSION["pass"]))
    {
        if(!$_SESSION["user"] == "afs" || !$_SESSION["pass"]=="123")
        {
            echo header("Location:login.php");
        }
    }
    $_SESSION["arr"]=$array=[1,2,3,4,5];
?>
<html>
    <head>

    </head>
    <body>
        <form method="post" action="closeSession.php">
            <input type="submit" value="cerrar sesion"/>
        </form>
        <form method="post" action="work02.php">
            <input type="submit" value="work02"/>
        </form>
    </body>
</html>