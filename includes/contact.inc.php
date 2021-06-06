<?php

require_once "Database.php";

if(isset($_POST['submit'])) {
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    if(!filter_var($email, FILTER_VALIDATE_EMAIL) || (strlen($email) > 200) || (strlen($email) < 8)) {
        header("Location: ../contact.php?error=true&msg=invalid email address");
    } else if(strlen($message) < 1) {
        header("Location: ../contact.php?error=true&msg=message can't be empty");
    } else {
        $sql = "INSERT INTO contact_msg (email, message) VALUES (:email, :message);";
        try {
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":message", $message);
            $stmt->execute();

            header("Location: ../contact.php?error=false&msg=success");
        } catch(PDOException $e) {
            header("Location: ../contact.php?error=true&msg=error occured submitting data");
        }

    }
} else {
    header("Location: ../contact.php?error=true&msg=invalid request");
}