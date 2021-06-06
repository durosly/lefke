<?php

require_once "Database.php";
session_start();

if(isset($_POST['id']) && isset($_SESSION['user_id'])) {
    $id = htmlspecialchars(trim($_POST['id']));

    
    $sql = "SELECT body FROM blog WHERE id = :id";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            echo $data['body'];
        } else {
            echo "no record found";
        }
    } catch(PDOException $e) {
        echo "Some error occured";
    }
} else {
    echo "Invalid request";
}