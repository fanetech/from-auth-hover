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

                    <tr>
                        <th>#</th>
                        <th>nom</th>
                        <th>prenom</th>
                        <th>telephone</th>
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
                $nb = mysqli_num_rows($result);
                if($nb){

                   foreach($result as $d => $val){
                    ?>
                    <tr>
                        <?php
                        foreach($val as $value){

                            echo "<td>{$value} </td>";
                        }
                        ?>
                    </tr>
                    <?php
                        
                   }
                }
                else{
                    var_dump("err");
                }
            }
            ?>
                </tbody>
            </table>
        </div>
        <div class="login-traitement">
        </div>
        <div>
            <?php
            $result = $_SESSION['result'];
            $typeMessage = $_SESSION['typeMessage'];
            if ($result) {
                if ($typeMessage == "success") {

                    echo "<div class='login-traitement'><h1>$resuslt</h1></div>";
                } else {
                    echo "<div class='login-traitement'><h2>$resuslt</h2></div>";
                }
            }


            ?>
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