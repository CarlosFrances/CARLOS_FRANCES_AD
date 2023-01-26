<html>
  <head>   
  </head>
  <body>
    <?php
      require_once("dbutils.php");
      var_export($_POST);
      $size = $_POST["size"];
      $color = $_POST["color"];
      $nombre = $_POST["nombre"];
      $conDB = conectarDB();


      $idInsertado = insertarHortaliza($conDB, $size, $color, $size);
      if ($idInsertado == 0) {
        echo '<script>alert("No se ha podido insertar");
        location.href="pagina1insert.php"</script>';
      };
      var_export($idInsertado);

      $resultados = getAllHortalizasFromTamColor($conDB, "", "");

      //modificarHortalizaFromTamAndColor($conDB, $size, $color,$nombre);

      //deleteHortaliza($conDB, 2);
    
      
      
      /*for($i = 0 ; $i < count($resultados) ; $i++){
        echo "El nombre es: ".$resultados[$i]["NOMBRE"]." El color es: ".$resultados[$i]["COLOR"]." El tamaño es: ".$resultados[$i]["TAM"];
      }*/
     ?>
    <table border="2px">
      <tr><th>Nombre</th><th>Tamaño</th><th>Color</th></tr>
      <?php
        foreach ($resultados as $fila){
          echo "<tr><td>".$fila["NOMBRE"]."</td><td>".$fila["TAM"]."</td><td>".$fila["COLOR"]."</td></tr>" ;
        }
      ?>
    </table>
  </body>
</html>