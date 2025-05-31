<?php
session_start();
require 'config/dbcon.php'; 
require 'functions/utils.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'] ?? '';

    if (handleLogin($conn, $email, $password, $error)) {
        header("Location: index.php");
        exit();
    }
}
?>
<!doctype html>
<html lang="vi">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
    <title>StartGame</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css" />
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>
    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <img class="img-fluid logo-dark mb-2" src="assets/img/logo.png" alt="Logo" />
                <div class="loginbox">
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Đăng nhập</h1>
                            <?php if (isset($error)): ?>
                            <div class="alert alert-danger"><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?>
                            </div>
                            <?php endif; ?>
                            <form action="login.php" method="POST">
                                <div class="form-group">
                                    <label class="form-control-label">Email</label>
                                    <input type="email" name="email" class="form-control" required
                                        autocomplete="email" />
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Mật khẩu</label>
                                    <div class="pass-group">
                                        <input type="password" name="password" class="form-control pass-input" required
                                            autocomplete="current-password" />
                                        <span class="fas fa-eye toggle-password"></span>
                                    </div>
                                </div>
                                <button class="mt-5 btn btn-lg btn-block btn-primary" type="submit">
                                    Đăng nhập
                                </button>
                                <div class="login-or">
                                    <span class="or-line"></span>
                                    <span class="span-or">hoặc</span>
                                </div>
                                <div class="social-login mb-3">
                                    <span>Đăng nhập bằng</span>
                                    <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#" class="google"><i class="fab fa-google"></i></a>
                                </div>
                                <div class="text-center dont-have">
                                    Chưa có tài khoản? <a href="register.php">Đăng ký</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/feather.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>