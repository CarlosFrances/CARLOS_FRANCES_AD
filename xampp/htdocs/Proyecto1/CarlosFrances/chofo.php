<html>
<head>
    <style>
        div{display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            min-height: 100vh;}
    </style>
</head>
<body>
    <div>
        <form method="post" action='batallafinal.php'>
            <input type="number" placeholder="1...10" name="numjugador"/>
            <input type="submit" value="PELEA!"/>
            <br/><br/>
            <select name="opcion1">
                <option>diferencia de 1</option>
                <option>diferencia de 2</option>
                <option>iguales</option>
            </select>
            <br/>
            <select name="opcion2">
                <option>diferencia de 1</option>
                <option>diferencia de 2</option>
                <option>iguales</option>
            </select>
        </form>
    </div>
</body>
</html>