<html>
<head>
    <title>Listas</title>
    <style>
        input{
            display:block;
            margin:2px;
            padding:5px;
            font: 16px Arial;
            border:5px;

        }
    </style>
</head>
<body>
    <form action="pantalla2.php" method="POST">
        <input name="numeros[]" placeholder="Numero 1..." type="number"/>
        <input name="numeros[]" placeholder="Numero 2..." type="number"/>
        <input name="numeros[]" placeholder="Numero 3..." type="number"/>
        <input name="numeros[]" placeholder="Numero 4..." type="number"/>
        <input name="numeros[]" placeholder="Numero 5..." type="number"/>
        <input name="numeros[]" placeholder="Numero 6..." type="number"/>
        <input name="numeros[]" placeholder="Numero 7..." type="number"/>
        <input name="numeros[]" placeholder="Numero 8..." type="number"/>
        <button>Enviar</button>
    </form>
</body>
</html>