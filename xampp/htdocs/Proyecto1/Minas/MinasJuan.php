<?php

			function concatenar($valor1, $valor2){
				return "$valor1$valor2";
			}

			//INTENTOS
			$intentos = 0;
			if(isset($_POST["intentos"])){
				$intentos = $_POST["intentos"];
				$intentos++;
			}

			//Generar una ubicación aleatoria y si la bomba ya fue ubicada, se da ese valor
			$x = rand(0, 2);
			$y = rand(0, 2);

			if(isset($_POST["x"]) && isset($_POST["y"])){
				$x = $_POST["x"];
				$y = $_POST["y"];
			}

			//Captura el historial si existe, y añade el valor pasado por el post
			if(isset($_POST["historial"])){
				$historial = $_POST["historial"];
				array_push($historial, $_POST["valor"]);
			} else {
				//Crea un array, y si existe un valor, lo añade al historial
				$historial = array();
            	if(isset($_POST["valor"])) array_push($historial, $_POST["valor"]);
			}

			echo "<div class='contenedor'>";
			//Definir el formulario y un historial de ubicaciones
			
			echo "<form action='index.php' method='POST'>";
			echo "<p><b>Intentos: $intentos</b></p>";

			//Tantas cajas como ubicaciones en el historial
			echo "<input type='hidden' name='intentos' value='$intentos'/>";
			echo "<input type='hidden' name='x' value='$x'/>";
			echo "<input type='hidden' name='y' value='$y'/>";

			//Crear cajas de historial
			for($i=0; $i<count($historial); $i++){
				echo "<input type='hidden' name='historial[]' value='". $historial[$i] ."'/>";
			}

			//Crear botones
			for($i=0; $i<3; $i++){
				for($j=0; $j<3; $j++){
					
					$color = "";

					for($orden=0; $orden<count($historial); $orden++){
						//Si el valor existe en el historial
						if($historial[$orden] == concatenar($j, $i)){
							$color = "#f4e9cd";

							if($historial[$orden] == concatenar($x, $y)){
								$color = "#031926";
							}
						}
					}

					echo "<button style='background-color:$color;";

					if($color != ""){
						echo "cursor:context-menu;' disabled ";
					} else {
						echo "'";
					}

					echo "name='valor'  value='$j$i'></button>";
				}
				echo "<br>";
			}

			//Cierra el formulario
			echo "</form>";
			echo "</div>";

		?>