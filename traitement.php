<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <div class="login-traitement">

        <?php
        if (isset($_POST["login"]) && isset($_POST["password"])) {
            $login = strtolower($_POST["login"]);
            $password = $_POST["password"];

            if ($login == "fanetech" && $password == "man") {
                echo "<h1>Connexion reussi</h1>";
            } else {
                echo "<h2>identifiant incorrect</h2>";
            }
        } else {
            echo "<h2>Renseigner tous les champs</h2>";
        }

        ?>

    </div>
</body>

</html>