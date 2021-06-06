<?php

function get_user_name($conn, $user_id) {
    $sql = "SELECT firstname, lastname FROM user WHERE id = :user_id;";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":user_id", $user_id);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            return $data;
        } else {
            return array("firstname" => "John", "lastname" => "Doe");
        }
    } catch (PDOException $e) {
        return array("firstname" => "John", "lastname" => "Doe");
    }
}

function get_blog_summary($conn) {
    $sql = "SELECT * FROM blog ORDER BY id DESC;";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        return false;
    }
}

function get_complain($conn) {
    $sql = "SELECT c.id AS id, firstname, lastname, message, date, category FROM complain AS c LEFT JOIN user AS u ON c.user_id = u.id ORDER BY c.id DESC;";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        return false;
    }
}