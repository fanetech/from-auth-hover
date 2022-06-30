<?php
session_start();
if (isset($_GET['valider'])) {
    if (isset($_GET['nom']) && isset($_GET['prenom']) && isset($_GET['numero'])) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ifoad";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $prenom = $_GET['prenom'];
        $nom = $_GET['nom'];
        $numero = $_GET['numero'];
        $id = $_SESSION["id"];

        $sql = "UPDATE repectoire SET nom='$nom', prenom= '$prenom', numero='$numero' WHERE id='$id'";

        if ($conn->query($sql) === TRUE) {
            header("location:login.php");
        } else {
            echo "Error updating record: " . $conn->error;
        }

        $conn->close();





        // $db = mysqli_connect('localhost', 'root', '', 'ifoad');
        // if ($db->connect_errno != 0) {
        //     echo "Erreur de connexion a la base de données";
        // } else {
        //     mysqli_query($db, "UPDATE repectoire set id='" . $_SESSION['id'] . "', prenom='" . $_GET['prenom'] . "', numero='" . $_GET['numero'] . "'WHERE id='" . $_SESSION['id'] . "'");
        //     echo "reussi";
        // }
    }
}
if (isset($_GET['id']) && isset($_GET['nom']) && isset($_GET['prenom']) && isset($_GET['numero'])) {
    $_SESSION["id"] = $_GET['id'];
?>

    <form action="update.php" method="get">
        <div class="txt-field">
            <input type="text" name="nom" value="<?php echo $_GET['nom'] ?>" required>
            <label>nom</label>
            <span></span>
        </div>
        <div class="txt-field">
            <input type="text" name="prenom" value="<?php echo $_GET['prenom'] ?>" required>
            <label>Prenom</label>
            <span></span>
        </div>
        <div class="txt-field">
            <input type="text" name="numero" value="<?php echo $_GET['numero'] ?>" required>
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
<?php

}
