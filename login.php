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
            if (isset($_POST["valider"])) {


                if (isset($_POST["login"]) && isset($_POST["password"])) {
                    $login = strtolower($_POST["login"]);
                    $password = $_POST["password"];
                    $db = mysqli_connect('localhost', 'root', '', 'ifoad');
                    if ($db->connect_errno != 0) {
                        echo "Erreur de connexion a la base de données";
                    } else {
                        $nom = $_POST['login'];
                        $prenom = $_POST['passwd'];
                        $req = "INSERT INTO information (nom, prenom) VALUES ('$nom', '$prenom')";
                        $result = mysqli_query($db, $req);
                        $nb = mysqli_num_rows($result);
                        if ($nb) {
                            session_start();
                            $_SESSION['login'] = $login;
                            $result = "Information ajouté avec succès";
                            $typeMessage = "success";
                        } else {
                            $result = "information incorrect";
                            $typeMessage = "error";
                        }
                    }
                } else {
                    $result = "Erreur: Login ou mot de passe incorrectes !";
                    $typeMessage = "error";
                }
            } else {
                echo "<h2>Renseigner tous les champs</h2>";
            }


            ?>
        </div>
        <div>
            <?php
            echo $result;

            ?>
        </div>
        <form action="login.php" method="post">
            <div class="txt-field">
                <input type="text" name="login" required>
                <label>nom</label>
                <span></span>
            </div>
            <div class="txt-field">
                <input type="password" name="password" required>
                <label>Prenom</label>
                <span></span>
            </div>
            <!-- <div class="pass">
                Forgot password
            </div> -->
            <input type="submit" name="valider" value="Login">
            <!-- <div class="signup_link">
                Nom a member? <a href="#">SignIn</a>
            </div> -->

        </form>
    </div>

</body>

</html>