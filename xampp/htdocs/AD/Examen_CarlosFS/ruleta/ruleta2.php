<?php
session_start();
$_SESSION["dinero"] -= 36;
$random = rand(0, 36);

for ($i = 0; $i < 3; $i++) {
    if ($i == 0) {
        if ($_SESSION["numero1"] == $random)
            $_SESSION["dinero"] += 36;
    }
    if ($i == 1) {
        if ($_SESSION["numero2"] == $random)
            $_SESSION["dinero"] += 36;
    }
    if ($i == 2) {
        if ($_SESSION["numero3"] == $random)
            $_SESSION["dinero"] += 36;
    }
}


?>

<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <form action="ruleta1.php">
        <button class="btn btn-info" style="float:left; margin-top:4%;">Apostar de nuevo</button>

    </form>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>

</html>