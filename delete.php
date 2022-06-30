<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

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

    // sql to delete a record
    $sql = "DELETE FROM repectoire WHERE id='$id'";

    echo "baba";
    if ($conn->query($sql) === TRUE) {
        header("location:login.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
}
