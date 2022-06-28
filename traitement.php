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
            if (isset($_POST["valider"])) {


                if (isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["numero"])) {
                    $login = strtolower($_POST["nom"]);
                    $password = $_POST["prenom"];
                    $db = mysqli_connect('localhost', 'root', '', 'ifoad');
                    if ($db->connect_errno != 0) {
                        echo "Erreur de connexion a la base de données";
                    } else {
                        $nom = $_POST['nom'];
                        $prenom = $_POST['prenom'];
                        $numero = $_POST['numero'];
                        $req = "INSERT INTO repectoire (nom, prenom, numero) VALUES ('$nom', '$prenom', '$numero')";
                        $result = mysqli_query($db, $req);
                        if ($result) {
                            session_start();
                           
                            // $_SESSION['numero'] = $login;

                            $result = "Information ajouté avec succès";
                            $typeMessage = "success";
                            $_SESSION['result']=$result;
                            $_SESSION['typeMessage']=$typeMessage;
                            echo "success";

                            header('location:login.php');
                        } else {
                            session_start();
                            $result = "information incorrect";
                            $typeMessage = "error";
                            $_SESSION['result']=$result;
                            $_SESSION['typeMessage']=$typeMessage;
                            header('location:login.php');
                        }
                    }
                } else {
                    $result = "Erreur: Login ou mot de passe incorrectes !";
                    $typeMessage = "error";
                }
            }


            ?>
    </div>
</body>

</html>