<?php

function conectarDB()
{
  try {
    $db = new PDO("mysql:host=localhost;dbname=wordle;charset=utf8mb4", "root", "");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
  } catch (PDOException $ex) {
    echo ("Error al conectar" . $ex->getMessage());
  }
}

function execute_query($conexion, $query, $arguments = null, $type_fetch = PDO::FETCH_ASSOC, $fetch_all = true)
{
  $comando = $conexion->prepare($query);
  $comando->execute($arguments);
  if ($fetch_all) {
    return $comando->fetchAll($type_fetch);
  }
}

function palabraAleatoria($palabras)
{
  $cantidadPalabras = sizeof($palabras);

  $aleatorio = random_int(0, $cantidadPalabras - 1);

  return $palabras[$aleatorio];
}

?>