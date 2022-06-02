<?php
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
    <link rel="stylesheet" href="css/css/reset_pass.css">
	
	<!-- logo -->
	<link rel="icon" href="img/DTH.png" type="image/x- icon">
</head>
<body>
<?php

    $error = '';
    $post_error = '';
    $email = '';
    $pass = '';
    $pass_confirm = '';

    $display_email = filter_input(INPUT_GET, 'email',FILTER_SANITIZE_EMAIL);

    if (isset($_GET['email']) && isset($_GET['token'])){
        $email = $_GET['email'];
        $token = $_GET['token'];
        
        if(filter_var($email, FILTER_SANITIZE_EMAIL) == false){
            $error = 'This is not a valid email address';
        }else if (strlen($token) != 32){
            $error = 'This is not a valid reset token';

        }else{
            if (isset($_POST['email']) && isset($_POST['pass']) &&
                isset($_POST['pass-confirm'])) {

                $email = $_POST['email'];
                $pass = $_POST['pass'];
                $pass_confirm = $_POST['pass-confirm'];

                if (empty($email)) {
                    $post_error = 'Please enter your email';
                }
                else if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
                    $post_error = 'This is not a valid email address';
                }
                else if (empty($pass)) {
                    $post_error = 'Please enter your password';
                }
                else if (strlen($pass) < 6) {
                    $post_error = 'Password must have at least 6 characters';
                }
                else if ($pass != $pass_confirm) {
                    $post_error = 'Password does not match';
                }
                else {
                    $result = change_password($email,$pass);
                    if ($result['code'] == 0){
                        $print = '<h1 class="text-success d-flex justify-content-center mt-5 mt-5">
                                    <b>Thay đổi mật khẩu thành công.
                                    <a href="login.php" class="text-danger">Đăng nhập</a> ngay.</b>
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
            else {
                print_r($_POST);
            }
        }
    }
    else{
        $error = 'Invalid email address or token';
    }
    
?>
<div class="box">
    <h3 class="text-center text-secondary text-light mt-4">Đổi mật khẩu mới</h3>
    <?php
        if (!empty($error)){
            echo "<div class='alert alert-danger'>$error</div>";
        }else{
            ?>
            <form novalidate method="post" action="" class="form-reset text-light">
                    <div class="form-group"> 
                        <label id="lab1" for="email">Email</label>
                        <input readonly value="<?= $display_email ?>" name="email" class="form-control" id="email" type="text" required="">
                    </div>
                    <div class="inputB">
                        <input  value="<?= $pass?>" name="pass" type="password" id="pass" required ="">
                        <label for="pass">Mật khẩu mới</label>
                        <div class="invalid-feedback">Password is not valid.</div>
                    </div>
                    <div class="inputB">
                        <input value="<?= $pass_confirm?>" name="pass-confirm" type="password" id="pass2" required="">
                        <label for="pass2">Xác nhận mật khẩu mới</label>
                        <div class="invalid-feedback">Password is not valid.</div>
                    </div>
                    <div class="form-group">
                        <?php
                            if (!empty($post_error)){
                                echo "<div class='alert alert-danger'>$post_error</div>";
                            }
                        ?>
                        <button class="btn btn-success px-5">Đổi mật khẩu</button>
                    </div>
            </form>
            <?php 

        }
    
    ?>
            
</div>

</body>
</html>
