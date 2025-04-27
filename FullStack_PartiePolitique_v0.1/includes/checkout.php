<?php
  include 'dbh.inc.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = htmlspecialchars($_POST["fullname"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $email = htmlspecialchars($_POST["email"]);
    $idprod = htmlspecialchars($_POST["idprod"]);
    
    var_dump($fullname, $phone, $email, $idprod);

    try {
        require_once "dbh.inc.php";
        // Insert visitor data
        $query = "INSERT INTO checkout (fullname, phone, email, idprod) VALUES (:fullname, :phone, :email, :idprod)"; 
        $stmt = $pdo->prepare($query);

        if (!$stmt) {
            die("Statement preparation failed: " . implode(" ", $pdo->errorInfo()));
        }

        $stmt->bindParam(":fullname", $fullname);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":idprod", $idprod);

        if (!$stmt->execute()) {
            die("Query execution failed: " . implode(" ", $stmt->errorInfo()));
        }

        $pdo = null;
        $stmt = null;
        header("Location: ../thanks.html");
        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../shop.php");
}
?>
