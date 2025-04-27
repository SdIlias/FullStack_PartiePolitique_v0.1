<?php
  include 'dbh.inc.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = htmlspecialchars($_POST["firstname"]);
    $lastname = htmlspecialchars($_POST["lastname"]);
    $email = htmlspecialchars($_POST["email"]);
    $mes = htmlspecialchars($_POST["message"]);
    
    var_dump($firstname, $lastname, $email, $mes);

    try {
        require_once "dbh.inc.php";
        // Insert visitor data
        $query = "INSERT INTO visitor (firstname, lastname, email, mes) VALUES (:firstname, :lastname, :email, :mes)"; 
        $stmt = $pdo->prepare($query);

        if (!$stmt) {
            die("Statement preparation failed: " . implode(" ", $pdo->errorInfo()));
        }

        $stmt->bindParam(":firstname", $firstname);
        $stmt->bindParam(":lastname", $lastname);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":mes", $mes);

        if (!$stmt->execute()) {
            die("Query execution failed: " . implode(" ", $stmt->errorInfo()));
        }

        $visitor_id = $pdo->lastInsertId();

        // File upload handling
        if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['file']['tmp_name'];
            $fileName = $_FILES['file']['name'];
            $fileSize = $_FILES['file']['size'];
            $fileType = $_FILES['file']['type'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));

            $uploadFileDir = 'uploads/';
            $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
            $dest_path = $uploadFileDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                // Insert file data
                $query = "INSERT INTO file (filename, filepath, visitor_id) VALUES (:filename, :filepath, :visitor_id)";
                $stmt = $pdo->prepare($query);

                if (!$stmt) {
                    die("Statement preparation failed: " . implode(" ", $pdo->errorInfo()));
                }

                $stmt->bindParam(":filename", $fileName);
                $stmt->bindParam(":filepath", $dest_path);
                $stmt->bindParam(":visitor_id", $visitor_id);

                if (!$stmt->execute()) {
                    die("Query execution failed: " . implode(" ", $stmt->errorInfo()));
                }
            } else {
                die('There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.');
            }
        }

        $pdo = null;
        $stmt = null;
        header("Location: ../index.php");
        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
}
?>
