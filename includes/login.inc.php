<?php

require_once "Database.php";

if(isset($_POST['submit'])) {
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));

    
    $sql = "SELECT * FROM user WHERE email = :email;";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            if(password_verify($password, $data['password'])) {
                session_start();
                $_SESSION['user_id'] = $data['id'];
                header("Location: ../home.php");
            } else {
                header("Location: ../login.php?error=true&msg=invalid credentails&hash={$data['password']}");
            }
        } else {
            header("Location: ../login.php?error=true&msg=no user found");
        }
    } catch(PDOException $e) {
        header("Location: ../login.php?error=true&msg=error occured submitting data");
    }
} else {
    header("Location: ../login.php?error=true&msg=invalid request");
}