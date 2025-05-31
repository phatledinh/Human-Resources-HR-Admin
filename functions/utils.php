<?php
require 'config/dbcon.php';

function validateLoginInput($email, $password) {
    if (empty($email) || empty($password)) {
        return "Vui lòng nhập đầy đủ email và mật khẩu.";
    }
    return null;
}

function handleLogin($conn, $email, $password_input, &$error) {
    $error = validateLoginInput($email, $password_input);
    if ($error) {
        return false;
    }

    $email = mysqli_real_escape_string($conn, $email);
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        $error = "Lỗi truy vấn cơ sở dữ liệu: " . mysqli_error($conn);
        return false;
    }

    $user = mysqli_fetch_assoc($result);

    if ($user && $password_input === $user['password']) {
        session_start();
        session_regenerate_id(true);
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        return true;
    } else {
        $error = "Email hoặc mật khẩu không đúng.";
        return false;
    }
}
?>