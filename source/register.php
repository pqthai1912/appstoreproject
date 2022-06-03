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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>DTH store</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/css/register.css">
	
	<!-- logo -->
	<link rel="icon" href="img/DTH.png" type="image/x- icon">
</head>
<body>
<?php
    $error = '';
    $first_name = '';
    $last_name = '';
    $email = '';
    $user = '';
    $pass = '';
    $pass_confirm = '';

    if (isset($_POST['first']) && isset($_POST['last']) && isset($_POST['email'])
    && isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['pass-confirm']))
    {
        $first_name = $_POST['first'];
        $last_name = $_POST['last'];
        $email = $_POST['email'];
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $pass_confirm = $_POST['pass-confirm'];

        if (empty($first_name)) {
            $error = 'Vui lòng nhập họ của bạn';
        }
        else if (empty($last_name)) {
            $error = 'Vui lòng nhập tên của bạn';
        }
        else if (empty($email)) {
            $error = 'Vui lòng nhập email của bạn';
        }
        else if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
            $error = 'Email không hợp lệ';
        }
        else if (empty($user)) {
            $error = 'Vui lòng nhập tên đăng nhập';
        }
        else if (empty($pass)) {
            $error = 'Vui lòng nhập mật khẩu';
        }
        else if (strlen($pass) < 6) {
            $error = 'Mật khẩu phải có ít nhất 6 ký tự';
        }
        else if ($pass != $pass_confirm) {
            $error = 'Mậu khẩu không trùng khớp';
        }
        else {
            // register a new account
            $result = register($user,$pass,$first_name,$last_name, $email);
            if ($result['code'] == 0){
                $print = '<h1 class="text-success d-flex justify-content-center mt-5 mt-5">
                            <b>Đăng ký tài khoản thành công. Vui lòng xác thực qua email của bạn.</b>
                          </h1>';
                die($print);
            }
            else if($result['code'] == 1){
                $error = 'Email này đã tồn tại';
            }else{
                $error = 'Lỗi đã xảy ra, vui lòng thử lại';
            }
        }
    }
?>
    <div class="box">
        <h2 class="text-center mt-4">Tạo tài khoản mới</h2>
        <form method="post" action="" novalidate class="form-register text-light">
            <div class="form-row">
                <div class="inputB col-md-6">
                    <input value="<?= $first_name?>" name="first" type="text" id="firstname" required=''>
                    <label for="firstname">Họ</label>
                </div>
                <div class="inputB col-md-6">
                    <input value="<?= $last_name?>" name="last" type="text" id="lastname" required=''>
                    <label for="lastname">Tên</label>
                    <div class="invalid-tooltip">Last name is required</div>
                </div>
            </div>
            <div class="inputB">
                <input value="<?= $email?>" name="email" type="text" id="email" required=''>
                <label for="email">Email</label>
            </div>
            <div class="inputB">
                <input value="<?= $user?>" name="user" type="text" id="user" required=''>
                <label for="user">Tên đăng nhập</label>
                <div class="invalid-feedback">Please enter your username</div>
            </div>
            <div class="inputB"> 
                <input  value="<?= $pass?>" name="pass" type="password" id="pass" required=''>
                <label for="pass">Mật khẩu</label>
                <div class="invalid-feedback">Password is not valid.</div>
            </div>
            <div class="inputB">
                <input value="<?= $pass_confirm?>" name="pass-confirm" type="password" id="pass2" required=''>
                <label for="pass2">Xác nhận mật khẩu</label>
                <div class="invalid-feedback">Password is not valid.</div>
            </div>

            <div class="form-group">
                <?php
                    if (!empty($error)) {
                        echo "<div class='alert alert-danger requirements'>$error</div>";
                    }
                ?>
                <button type="submit" class="btn btn-success px-5 mt-3 mr-2">Đăng ký</button>
                <button type="reset" class="btn btn-danger px-5 mt-3">Reset</button>
            </div>
            <div class="form-group">
                <p><b>Đã có tài khoản? <a href="login.php" class="text-danger">Đăng nhập</a> ngay.</b></p>
            </div>
        </form>
    </div>
</body>
</html>

