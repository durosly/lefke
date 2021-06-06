<?php

require_once "Database.php";
session_start();

if(isset($_POST['submit']) && $_SESSION['user_id']) {
    $message = htmlspecialchars(trim($_POST['message']));
    $date = htmlspecialchars(trim($_POST['date']));
    $category = htmlspecialchars(trim($_POST['category']));
    $agree = htmlspecialchars(trim($_POST['agree']));

    if(isset($agree) && !empty($agree)) {

        if(empty($message) || empty($date) || empty($category)) {
            header("Location: ../add-complain.php?error=true&msg=enter all fields");
        } else {
            $sql = "INSERT INTO complain (message, date, category, user_id) VALUES (:message, :date, :category, :user_id);";
            try {
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":message", $message);
                $stmt->bindParam(":date", $date);
                $stmt->bindParam(":category", $category);
                $stmt->bindParam(":user_id", $_SESSION['user_id']);
                $stmt->execute();

                header("Location: ../complains.php?error=false&msg=added successfully");
            } catch(PDOException $e) {
                header("Location: ../add-complain.php?error=true&msg=error occured submitting data");
            }
        }

    } else {
        header("Location: ../add-complain.php?error=true&msg=please, agree that information is valid");
    }
    
} else {
    header("Location: ../add-complain.php?error=true&msg=invalid request");
}