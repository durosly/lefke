<?php

require_once "Database.php";

if(isset($_POST['submit'])) {
    $email = htmlspecialchars(trim($_POST['email']));
    $firstname = htmlspecialchars(trim($_POST['firstname']));
    $lastname = htmlspecialchars(trim($_POST['lastname']));
    $password = htmlspecialchars(trim($_POST['password']));

    if(!filter_var($email, FILTER_VALIDATE_EMAIL) || (strlen($email) > 200) || (strlen($email) < 8)) {
        header("Location: ../signup.php?error=true&msg=invalid email address");
    } else if(strlen($firstname) < 1) {
        header("Location: ../signup.php?error=true&msg=firstname can't be empty");
    } else if(strlen($lastname) < 1) {
        header("Location: ../signup.php?error=true&msg=lastname can't be empty");
    } else if(strlen($password) < 1) {
        header("Location: ../signup.php?error=true&msg=password can't be empty");
    } else if(strlen($firstname) > 50) {
        header("Location: ../signup.php?error=true&msg=firstname is too long");
    } else if(strlen($lastname) > 50) {
        header("Location: ../signup.php?error=true&msg=lastname is too long");
    } else {
        $sql = "INSERT INTO user (email, firstname, lastname, password) VALUES (:email, :firstname, :lastname, :password);";
        $encryptedPassword = password_hash($password, PASSWORD_DEFAULT);
        try {
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":firstname", $firstname);
            $stmt->bindParam(":lastname", $lastname);
            $stmt->bindParam(":password", $encryptedPassword);
            $stmt->execute();

            header("Location: ../signup.php?error=false&msg=success. You can now log in");
        } catch(PDOException $e) {
            header("Location: ../signup.php?error=true&msg=error occured submitting data");
        }

    }
} else {
    header("Location: ../signup.php?error=true&msg=invalid request");
}