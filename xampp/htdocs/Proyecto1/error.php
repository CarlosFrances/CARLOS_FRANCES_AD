<html>
    <head>
    <?php 
    $aletabla=$_POST['tam'];
    $car=$_POST['car'];
    $ope=$_POST['ope'];
    $dir="http://localhost/Proyecto1/matriz.php"
    ?>
</head>
<body>
    <form method="get" action="matriz.php">
        <input type="hidden" name="tam" value="<?php $aletabla ?>">
        <input type="hidden" name="car" value="<?php $car ?>">
        <input type="hidden" name="ope" value="<?php $ope ?>">
    </form>
    <?php
        if($aletabla%2==1) header("Location: $dir") 
    ?>
    <h1>POR FAVOR, INTRODUCE UN NUMERO PAR</h1>
    <form method="POST" action="form.php"><br/><br/><br/>
        <input type="submit" value="Volver"/>
    </form>
</body>

</html>
