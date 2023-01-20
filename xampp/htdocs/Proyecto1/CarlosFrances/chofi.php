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
        <form method="post" action="batalla1.php">
            <input type="number" placeholder="1 / 2 / 3" name="numjugador"/>
            <input type="submit" value="PELEA!"/>
            <br/><br/>
            <select name="opcion">
                <option>mayor</option>
                <option>menor</option>
                <option>igual</option>
            </select>
        </form>
    </div>
</body>
</html>