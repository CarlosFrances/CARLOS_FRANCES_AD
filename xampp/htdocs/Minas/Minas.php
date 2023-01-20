<html>
<head>
    <?php 
        $alto=3;
        $xmina=rand(0,alto-1);
        $ymina=rand(0,alto-1);
        $matriz= array(array(0,1,2), array(0,1,2));
    ?>
</head>
<body>

    <table border=1>
        <?php 
            for($i=0;$i < len($alto);$i++){
                echo "<tr>";
                for($j=0;$j < len($alto);$j++){
                    echo "<td width='50px' height='50px'><input type='text' name='casilla".$i.$j."'></td>";
                }
                echo "</tr>";
            }
        ?>
    </table>

</body>
</html>