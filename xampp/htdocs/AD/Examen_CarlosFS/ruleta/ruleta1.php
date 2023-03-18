<?php


if (isset($_POST["numero1"])) {
    session_start();
    $_SESSION["numero1"] = $_POST["numero1"];
    $_SESSION["numero2"] = $_POST["numero2"];
    $_SESSION["numero3"] = $_POST["numero3"];
    header('Location: ruleta2.php');
} else {
    session_start();
    $_SESSION["dinero"] = 500;
}


?>


<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <center>
            <h1>Bienvenido a la ruleta aragonesa</h1>
            <form action="ruleta1.php" method="POST">
                <h2>Dinero actual:
                    <?php echo $_SESSION["dinero"]; ?> euros
                </h2>
                <div class="row">
                    <input type="number" min="0" max="36" required style="margin-top:4%;" class="form-control"
                        placeholder="numero 1" name="numero1" />
                </div>
                <div class="row">
                    <input type="number" min="0" max="36" required style="margin-top:4%;" class="form-control"
                        placeholder="numero 2" name="numero2" />
                </div>
                <div class="row">
                    <input type="number" min="0" max="36" required style="margin-top:4%;" class="form-control"
                        placeholder="numero 3" name="numero3" />
                </div>
                <button class="btn btn-info" style="float:left; margin-top:4%;">Apostar</button>
            </form>
        </center>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>

</html>