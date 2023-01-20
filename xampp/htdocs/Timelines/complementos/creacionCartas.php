<?php

$MazoCartas =[ //Eventos no secuenciales en año
    "1851"   => "Se escribe Moby-Dick",
    "1863" => "Abraham Lincoln abole la esclavitud en EEUU",
    "1888" => "Invención del submarino",
    "1889" => "Creación de Nintendo",
    "1899" => "Fundación del FC Barcelona",
    "1902" => "Fundación del Real Madrid FC",
    "1904" => "Comienza la construcción del canal de Panamá",
    "1911" => "Fundación de IBM",
    "1914" => "Comienza la primera guerra mundial",
    "1918" => "Estalla la pandemia de Gripe Española en Europa",
    "1928" => "Emisión del primer capítulo de Mickey Mouse",
    "1929" => "Primera gala de los oscar",
    "1930" => "Primer mundial de fútbol",
    "1934" => "Creación de DC Comics",
    "1936" => "Estalla la guerra civil española",
    "1937" => "Pablo Picasso pinta el \"Guernica\"",
    "1939" => "Comienza la segunda guerra mundial",
    "1945" => "Creación de la primera bomba atómica",
    "1952" => "Desarrollo del primer videojuego de la historia",
    "1954" => "J.R.R. Tolkien publica \"El señor de los anillos\"",
    "1955" => "Primera Champions League",
    "1957" => "Puesta en órbita del Sputnik",
    "1960" => "Primeras Paraolimpiadas",
    "1962" => "Invención del LED",
    "1969" => "Primera llegada del hombre a la Luna",
    "1970" => "Fundación de Queen",
    "1975" => "Muere Francisco Franco",
    "1977" => "Sale en cines \"Star Wars\"",
    "1979" => "Sale en cines \"Alien: El octavo pasajero\"",
    "1980" => "John Lenon es asesinado por un fan",
    "1981" => "Fundación de Metallica",
    "1984" => "Primer ordenador Macintosh",
    "1985" => "Primer SO Windows",
    "1986" => "España entra en la UE",
    "1989" => "Cae el Muro de Berlín",
    "1990" => "Final Fantasy llega a Europa",
    "1991" => "Creación de Python",
    "1994" => "Sale al mercado la Sony Play Station",
    "1995" => "Creación de Java",
    "1996" => "Sale al mercado el primer juego de Pokemon",
    "1997" => "J.K. Rowling publica Harry potter",
    "1998" => "Creación de Google",
    "1999" => "Sale al mercado el primer móvil con cámara",
    "2001" => "Ataque terrorista a las Torres Gemelas",
    "2002" => "Hundimiento del \"Prestige\"",
    "2003" => "Primera emisión de \"Aquí no Hay Quien Viva\"",
    "2004" => "Salida al mercado de GTA San Andreas",
    "2010" => "España gana el mundial de Sudáfrica",
    "2011" => "Muerte de Steve Jobs",
    "2013" => "Se elige al Papa Francisco",
    "2014" => "Abdicación del Rey Juan Carlos de Borbón",
    "2016" => "Salida de Pokemon Go",
    "2018" => "El rover Opportunity se queda in energía",
    "2019" => "Estalla la pandemia de SARS-CoV-2",
    "2022" => "Rusia invade Ucrania"
]; //Encontrar manera de obtener un key de un diccionario aleatorio ($aleatorio = array_rand($arr,1);)

$cartasSacadas=array();

function generarCartaAleatoria($clickable, $baraja){
    //Nuevo
    global $MazoCartas;
    global $cartasSacadas;
    while(true){
        $year=array_rand($MazoCartas,1);
        $evento=$MazoCartas[$year];
        if(in_array($year,$cartasSacadas)) continue;
        else break;
    }
    array_push($cartasSacadas,$year);
    //Fin de lo nuevo
    /*$year = rand(0, 2022);
    $eventos = array("caca", "adios", "hola", "prueba", "de", "texto");
    $evento = $eventos[array_rand($eventos)];*/




    $devolver = "<div class=\"carta\"";
    if($clickable){
        $devolver .= " onclick=\"cambiar(this, 'mazoUsuario')\">";
    } else {
        $devolver .= ">";
    }
    
    $devolver .= "<input name='$baraja' value='$year,$evento' type='hidden'/>";
    $devolver .= "<p>$evento</p>";

    if(!$clickable){
        $devolver .= "<p>$year</p>";
    }
    $devolver .= "</div>";
    return $devolver;
}

function devolverCarta($datos, $mazo){
    $mazoActual = $mazo;
    if($mazo == "mazoTiempo"){
        $arrayActual = "cartasTiempo[]";
        $devolver = "<div ";
    } else {
        $arrayActual = "cartasUsuario[]";
        $devolver = "<div onclick=\"cambiar(this, '$mazoActual')\"";
    }
    
    $devolver .= " class=\"carta\">";
    $devolver .= "<input name='$arrayActual' value='$datos[0],$datos[1]' type='hidden'/>";
    $devolver .= "<p>". $datos[1] ."</p>";
    if($mazo == "mazoTiempo"){
        $devolver .= "<p>". $datos[0] ."</p>";
    }
    $devolver .= "</div>";
    return $devolver;
}

function crearDatosAleatorios(){
    $year = rand(0, 2022);
    $eventos = array("caca", "adios", "hola", "prueba", "de", "texto");
    $evento = $eventos[array_rand($eventos)];
    return [$year,$evento];
}

?>