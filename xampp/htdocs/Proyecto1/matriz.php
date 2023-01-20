<html>
<head>
    <?php 
		$aletabla=$_POST['tam'];
        $car=$_POST['car'];
        $ope=$_POST['ope'];
	?>
</head>
<body>

<table border="1" height="150" width="150">
	<?php 
        //var_export($_POST);
	
		$con =0;
		for($i=0;$i < $aletabla;$i++){
			echo "<tr>";
			for($x=0;$x < $aletabla;$x++){
				if($x==$i or $x+$i==$aletabla-1 or $x==($aletabla-1)/2 or $i==($aletabla-1)/2){
					 echo "<td style='background-color:tomato'>$car</td>";
					} 
				else {echo "<td align='center' style='background-color:yellow'>$aletabla</td>"; $con++;}
			}
			echo "</tr>";
		}	

        

	?>
	</table>
    <?php 
        if($ope=="+")
        echo "Total: ",($aletabla + $con );
    else
     echo "Total: ",($aletabla * $con );
    ?>

</body>
</html>
