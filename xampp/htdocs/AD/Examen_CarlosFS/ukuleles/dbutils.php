<?php

function execute_query($conexion, $query, $arguments = null, $type_fetch = PDO::FETCH_ASSOC, $fetch_all = true)
{
    $comando = $conexion->prepare($query);
    $comando->execute($arguments);
    if ($fetch_all) {
        return $comando->fetchAll($type_fetch);
    }
}

?>