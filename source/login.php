<?php
session_start();
if (isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}

require_once('db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>DTH store</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/css/login.css">
	
	<!-- logo -->
	<link rel="icon" href="img/DTH.png" type="image/x- icon">
</head>

<body>

    <?php

    $error = '';

    $user = '';
    $pass = '';

    if (isset($_POST['user']) && isset($_POST['pass'])) {
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        if (empty($user)) {
            $error = 'Please enter your username';
        } else if (empty($pass)) {
            $error = 'Please enter your password';
        } else if (strlen($pass) < 6) {
            $error = 'Password must have at least 6 characters';
        } else {
            $result = login($user, $pass);
            if ($result['code'] == 0) {
                $data = $result['data'];
                $_SESSION['user'] = $user;
                $_SESSION['name'] = $data['firstname'] . ' ' . $data['lastname'];

                //phân quyền người dùng tại đây!//
                $phanquyen = $data['phanquyen'];

                switch ($phanquyen) {
                    case 0:
                        //admin//
                        header('Location: role/admin/html/ltr/trangchu.php?id='.$data["id"]);
                        break;
                    case 1:
                        //dev//
                        header('Location: role/dev/html/ltr/home.php?id='.$data["id"]);
                        break;
                    default:
                        //người dùng thông thường//
                        header('Location: index.php');
                }
                exit();
            } else {
                $error = $result['error'];
            }
        }
    }
    ?>
    <div class="box">
        <h2 class="text-center text-secondary text-light mt-3">Đăng nhập</h2>
        <form method="post" action="" class="form-container text-light">
            <div class="inputB">
                <input value="<?= $user ?>" name="user" id="user" type="text" required=''>
                <label for="user">Tên đăng nhập</label>
            </div>
            <div class="inputB">
                <input name="pass" value="<?= $pass ?>" id="password" type="password" required=''>
                <label for="password">Mật khẩu</label>
            </div>
            <div class="form-group custom-control custom-checkbox">
                <input <?= isset($_POST['remember']) ? 'checked' : '' ?> name="remember" type="checkbox" class="custom-control-input" id="remember">
                <label class="custom-control-label" for="remember">Ghi nhớ đăng nhập</label>
            </div>
            <div class="form-group">
                <?php
                if (!empty($error)) {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
                ?>
                <button class="btn btn-success px-5 btn-block">Đăng nhập</button>
            </div>
            <div class="form-group">
                <p>Chưa có tài khoản đăng nhập? <a href="register.php" class="text-danger">Đăng ký</a>.</p>
                <p>Quên mật khẩu? <a href="forgot.php" class="text-danger">Đổi mật khẩu</a>.</p>
            </div>
        </form>
    </div>

</body>

</html>