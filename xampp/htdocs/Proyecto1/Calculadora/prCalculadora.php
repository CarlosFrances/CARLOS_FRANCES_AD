<html>
<head>
    <title>Practica Calculadora</title>
    <style>
        div{display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            min-height: 100vh;}
        input{width:49%;display:inline-block;}
        button{width:24%;height:30px;}
    </style>
</head>
<body>
    <h1>Practica calculadora</h1>
    <div>
    <form method="post" action="prResultado.php">
        <input type="number" placeholder="numero1" name="num1"/>
        <input type="number" placeholder="numero2" name="num2"/>
        <br/><br/>
        <button name="operacion" value="suma">SUMA</button>
        <button name="operacion" value="resta">RESTA</button>
        <button name="operacion" value="multiplicacion">MULT</button>
        <button name="operacion" value="division">DIV</button>
    </form>
</div>
</body>
</html>