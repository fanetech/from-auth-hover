<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Formulaire de connexion</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <div class="center">
        <h1>
            Login
        </h1>
        <div class="login-traitement">


            <?php
            if(isset($_POST["valider"])){

            
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
        }

            ?>
        </div>
        <form action="login.php" method="post">
            <div class="txt-field">
                <input type="text" name="login" required>
                <label>Username</label>
                <span></span>
            </div>
            <div class="txt-field">
                <input type="password" name="password" required>
                <label>Password</label>
                <span></span>
            </div>
            <div class="pass">
                Forgot password
            </div>
            <input type="submit" name="valider" value="Login">
            <div class="signup_link">
                Nom a member? <a href="#">SignIn</a>
            </div>

        </form>
    </div>

</body>

</html>