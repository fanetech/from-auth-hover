<?php
session_start();

?>
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
        <div class="traitement">

            <table>
                <thead>

                    <tr class="trth">
                        <th>#</th>
                        <th>nom</th>
                        <th>prenom</th>
                        <th>telephone</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <tbody>


                    <?php
                    $db = mysqli_connect('localhost', 'root', '', 'ifoad');
                    if ($db->connect_errno != 0) {
                        echo "Erreur de connexion a la base de données";
                    } else {
                        $req = "SELECT * FROM repectoire";
                        $result = mysqli_query($db, $req);
                        $i = 0;
                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                            <tr>
                                <td><?php echo $row["id"]; ?></td>
                                <td><?php echo $row["nom"]; ?></td>
                                <td><?php echo $row["prenom"]; ?></td>
                                <td><?php echo $row["numero"]; ?></td>
                                <td><a href="update.php?id=<?php echo $row["id"]; ?>&nom=<?php echo $row["nom"] ?>&prenom=<?php echo $row["prenom"] ?>&numero=<?php echo $row["numero"] ?>">Modifier</a></td>
                                <td><a href="delete.php?id=<?php echo $row["id"] ?>">Supprimer</a></td>
                            </tr>
                    <?php
                            $i++;
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div>

        </div>
        <form action="traitement.php" method="post">
            <div class="txt-field">
                <input type="text" name="nom" required>
                <label>nom</label>
                <span></span>
            </div>
            <div class="txt-field">
                <input type="text" name="prenom" required>
                <label>Prenom</label>
                <span></span>
            </div>
            <div class="txt-field">
                <input type="text" name="numero" required>
                <label>Numero</label>
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