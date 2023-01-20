<html>
<head>     
    <?php 
        $valor=$_POST['select'];
        var_export($_POST)
    ?>
</head>
<body>
    <ul>
        <?php 
            for($i=0;$i<=$valor;$i++){
                echo "<li>$i</li>";
            }
        ?>
    </ul>
</body>
</html>