<html>
<head>
</head>
<body>
<form method="POST" action="matriz.php">
        <input name="tam" type="text" pattern="^\d*[13579]$"/>&nbsp;&nbsp;elija un tamaño (impar)<br/><br/>
        <input name="car" type="text"/>&nbsp;&nbsp;elija un caracter de relleno<br/><br/>
        <select name="ope">
            <option value="+">+</option>
            <option value="*">*</option>    
        </select>&nbsp;&nbsp;operador<br/><br/>
        <input type="submit" value="GO"/>
    </form>
</body>
</html>