<?php
session_start();

require_once("header.php");
require("dbutils.php");

$conexion  = conectarDB();
$usuarios = execute_query($conexion, "SELECT *FROM usuarios");


  var_export($_POST);


?>

<!DOCTYPE html>
<html>
  <head>
    <title>Admin 1</title>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>    The following CSS library files are loaded for use in this example to provide the styling of the table:
    <script>
      $(document).ready(function () {
    $('#example').DataTable();
});
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css"/>
  </head>
  <body>
    <div class="container" style="margin-top:20px">
      <a href="logout.php">Cerrar sesión </a>
      <form method="POST">
      <table id="miTabla" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Nombre</th>
                <th>Clave</th>
            </tr>
        </thead>
        <tbody>
          <?php
          
            foreach($usuarios as $usuario){
              echo "<tr>";
                echo "<td>". $usuario["usuario"] ."</td>";
                echo "<td><input type='text' name='nombres[]' value='". $usuario["nombre"] ."'/></td>";
                echo "<td><input type='text' name='claves[]' value='". $usuario["calve"] ."'/></td>";
              echo "</tr>";
            }
          
          ?>
          </tbody>
          <tfoot>
            <tr>
                <th>Usuario</th>
                <th>Nombre</th>
                <th>Clave</th>              
            </tr>
        </tfoot>
        </table>
        <button class="btn btn-primary">
          Actualizar
        </button>
      </form>
    </div>
  </body>
</html>