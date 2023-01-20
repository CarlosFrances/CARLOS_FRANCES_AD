<?php

function conectarDB()
{
  try
  {
    $db = new PDO("mysql:host=localhost;dbname=DB_FRUITIS;charset=utf8mb4","root","");
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    return $db; 
  }
  catch (PDOException $ex)
  {
    echo ("Error al conectar".$ex->getMessage());
  }
}
function getHortalizaFromTam2($conDb, $tam)
{
  try
  {
    $sql = "SELECT * FROM HORTALIZAS WHERE TAM=:tamAux";
    $stmt = $conDb->prepare($sql,array(PDO::ATTR_CURSOR=>PDO::CURSOR_FWDONLY));
    $stmt->execute(array(":tamAux"=>$tam));
    $fila = $stmt->fetchAll();
   }
  catch (PDOException $ex)
  {
    echo ("Error getHortalizaFromTam2".$ex->getMessage());
  }
  return $fila;
}
function getHortalizaFromTam($conDb, $tam)
{
  try
  {
    $sql = "SELECT * FROM HORTALIZAS WHERE TAM=".$tam;
    $stmt = $conDb->query($sql);
    $fila = $stmt->fetch(PDO::FETCH_ASSOC);
   }
  catch (PDOException $ex)
  {
    echo ("Error al conectar".$ex->getMessage());
  }
  return $fila;
}
function getAllHortalizasFromTam($conDb, $tam)
{
  $vectorTotal = array();
  try
  {
    $sql = "SELECT * FROM HORTALIZAS WHERE TAM=".$tam;
    $stmt = $conDb->query($sql);
    while($fila = $stmt->fetch(PDO::FETCH_ASSOC))
    {
      $vectorTotal[]=$fila;
    }
   }
  catch (PDOException $ex)
  {
    echo ("Error al conectar".$ex->getMessage());
  }
  return $vectorTotal;
}
function getAllHortalizasFromTam2($conDb, $tam)
{
  $vectorTotal = array();
  try
  {
    $sql = "SELECT * FROM HORTALIZAS WHERE TAM=:tamAux";
    $stmt = $conDb->prepare($sql,array(PDO::ATTR_CURSOR=>PDO::CURSOR_FWDONLY));
    $stmt->execute(array(":tamAux"=>$tam));
    while($fila = $stmt->fetch(PDO::FETCH_ASSOC))
    {
      $vectorTotal[]=$fila;
    }
   }
  catch (PDOException $ex)
  {
    echo ("Error al conectar".$ex->getMessage());
  }
  return $vectorTotal;
}

function getAllHortalizasFromTamColor($conDb, $tam, $color)
{
  $vectorTotal = array();
  try
  {
    
    $arr = array();
    $sql = "SELECT * FROM HORTALIZAS";
    if($tam != ""){
      $arr[":tamAux"] = $tam;
      $sql = "SELECT * FROM HORTALIZAS WHERE TAM=:tamAux";
    } 
    if($color != ""){
      $arr[":colorAux"] = $color;
      $sql = "SELECT * FROM HORTALIZAS WHERE COLOR=:colorAux";
    } 
    if(count($arr) == 2) $sql = "SELECT * FROM HORTALIZAS WHERE TAM=:tamAux and COLOR=:colorAux";
    $stmt = $conDb->prepare($sql,array(PDO::ATTR_CURSOR=>PDO::CURSOR_FWDONLY));
    $stmt->execute($arr);
    while($fila = $stmt->fetch(PDO::FETCH_ASSOC))
    {
      $vectorTotal[]=$fila;
    }
   }
  catch (PDOException $ex)
  {
    echo ("Error al conectar".$ex->getMessage());
  }
  return $vectorTotal;
}


?>