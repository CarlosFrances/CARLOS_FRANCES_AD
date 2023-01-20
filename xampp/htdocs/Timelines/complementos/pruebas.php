<?php
    $arr=[
        "1969" => "Primer alunizaje tripulado",
        "2019" => "Covid - 19",
        "2003" => "Nace el gran Juanito Gómez Villa",
        "2009" => "Lanzamiento LoL",
        "2016" => "Donald Trump elegido presidente"
    ];

    $aleatorio = array_rand($arr,1);
    print($aleatorio);
    print(" ".$arr[$aleatorio]);
?>