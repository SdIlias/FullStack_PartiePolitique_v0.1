<?php
    include 'dbh.inc.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = htmlspecialchars($_POST["title"]);
        $description = htmlspecialchars($_POST["description"]);
        
        var_dump($title, $description);
        try {
            require_once "dbh.inc.php";
            $query = "INSERT INTO blog (title, description) VALUES (:title, :description)"; 
            $stmt = $pdo->prepare($query);

            if (!$stmt) {
                die("Statement preparation failed: " . implode(" ", $pdo->errorInfo()));
            }

            $stmt->bindParam(":title", $title);
            $stmt->bindParam(":description", $description);

            if (!$stmt->execute()) {
                die("Query execution failed: " . implode(" ", $stmt->errorInfo()));
            }

            $pdo = null;
            $stmt = null;
            header("Location: ../blog.php");
            die();
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    } else {
        header("Location: ../blog.php");
    }
?>
