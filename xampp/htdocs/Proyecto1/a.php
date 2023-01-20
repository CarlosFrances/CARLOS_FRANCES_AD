<html>
<head>
	<?php 
		$color1 = rand(0,255);
		$color2 = rand(0,255);
		$color3 = rand(0,255);
		$aletabla;
		do{
			$aletabla= rand(9,15);
		}while($aletabla%2==0);
	?>
</head>
<body>
	<h1>
		El numero de la suerte es el <?php echo rand(0,20)?>
	</h1>
	<h2 style = "color:rgb(<?php echo($color1)?>,
		<?php echo($color2)?>,
		<?php echo($color3)?>)">Color
	</h2>
	
	<?php

		$image='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSBqp5Yj1_YqqyjbHfFHDsyl64pOhSu2lQBAPUFRGLbQlsYgPbh1OclfKKJBnT0FU8aBlo&usqp=CAU';
		$image2='https://cdn.milenio.com/uploads/media/2021/03/22/la-vida-de-homero-simpson.jpg';
		$imageData = base64_encode(file_get_contents($image));
		$imageData2 = base64_encode(file_get_contents($image2));
		$aleatorio=rand(0,1);
		if($aleatorio==0)
		{echo '<img src="data:image/jpeg;base64,'.$imageData.'" width="150" height="150">';}
		else {echo '<img src="data:image/jpeg;base64,'.$imageData2.'" width="150" height="150">';}
	?>

	<br></br>

	<table border="1" height="150" width="150">
	<?php 
	
		$con =0;
		for($i=0;$i < $aletabla;$i++){
			echo "<tr>";
			for($x=0;$x < $aletabla;$x++){
				if($x==$i or $x+$i==$aletabla-1 or $x==($aletabla-1)/2 or $i==($aletabla-1)/2){
					 echo "<td style='background-color:red'>*</td>";
					} 
				else {echo "<td align='center' background='blue' style='background-color:blue'>$aletabla</td>"; $con++;}
			}
			echo "</tr>";
		}	

		echo "Total: ",bcmul($aletabla,$con,0);

	?>
	</table>
	
</body>
</html>