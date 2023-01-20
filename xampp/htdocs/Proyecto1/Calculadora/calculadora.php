<html>
<head>
    <?php 
        function go($ope){
            $operador=$ope;
        }
    ?>
    <style>
        table{width:200px;border-color:#0000ff;}
    </style>
</head>
<body>

    <div>
        <form action ="resultado.php">
            <table border="2" border-color="blue">
                <tr>
                    <td>
                        <input type="text" name="numero1" width="50px"/><input type="text" name="numero2" width="50px"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="button" value="+" name="boton+" onclick="go(this.value)"/><input type="button" value="-" name="boton-" onclick="go(this.value)"/>
                    </td>
                </tr>
                <tr>
                    <td width=50%>
                        <input type="button" value="x" name="botonx" onclick="go(this.value)"/><input type="button" value="/" name="boton/" onclick="go(this.value)"/>
                    </td>
                </tr>
            </table>
            <input type="submit" value="GO!"/>
            <input type="hidden" name="<?php echo "$operador" ?>">
        </form>
    </div>
</body>
</html>