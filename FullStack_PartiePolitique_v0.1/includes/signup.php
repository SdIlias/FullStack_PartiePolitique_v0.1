<?php
session_start();
include 'dbh.inc.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = htmlspecialchars($_POST["firstname"]);
    $lastname = htmlspecialchars($_POST["lastname"]);
    $email = htmlspecialchars($_POST["email"]);
    $passwor = htmlspecialchars($_POST["passwor"]);
    
    var_dump($firstname, $lastname, $email, $passwor);

    try {

        // Insert visitor data
        $query = "INSERT INTO account (firstname, lastname, email, passwor) VALUES (:firstname, :lastname, :email, :passwor)"; 
        $stmt = $pdo->prepare($query);

        if (!$stmt) {
            die("Statement preparation failed: " . implode(" ", $pdo->errorInfo()));
        }

        $stmt->bindParam(":firstname", $firstname);
        $stmt->bindParam(":lastname", $lastname);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":passwor", $passwor);

        if (!$stmt->execute()) {
            die("Query execution failed: " . implode(" ", $stmt->errorInfo()));
        }

        $pdo = null;
        $stmt = null;
        $_SESSION['firstname'] = $firstname;
        header("Location: ../index.php");
        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../Inscription.html");
}
?>
