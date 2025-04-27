<?php
session_start();
include 'dbh.inc.php';

// Enable error reporting for debugging
/* ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); */

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize user input
    $email = htmlspecialchars($_POST["email"]);
    $passwor = htmlspecialchars($_POST["passwor"]);
    
    try {
        $query = "SELECT * FROM account WHERE email = :email"; 
        $stmt = $pdo->prepare($query);

        if (!$stmt) {
            die("Statement preparation failed: " . implode(" ", $pdo->errorInfo()));
        }

        $stmt->bindParam(":email", $email);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        // Debugging statement
/*         echo "<pre>";
        print_r($data);
        echo "</pre>"; */

        if ($data) {
            // Check if the provided password matches the password in the database
            if ($passwor === $data['passwor']) {
                $_SESSION['firstname'] = $data['firstname'];
                header("Location: ../index.php");
                exit();
            } else {
                header("Location: ../invalid.html");
            }
        } else {
            header("Location: ../invalid.html");
        }

        // Close the statement and connection
        $stmt = null;
        $pdo = null;

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../Inscription.html");
    exit();
}
?>
