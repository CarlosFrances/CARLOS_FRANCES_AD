<html>
<head>     
</head>
<body>
    <h1>a</h1>
    <form method="post" action="ul2.php">
        <select name="select">
            <?php 
                for($i=0;$i<11;$i++){
                    echo "<option>$i</option>";
                }
            ?>
        </select>
        <input type="submit" value="GO!"/>
    </form>
</body>
</html>