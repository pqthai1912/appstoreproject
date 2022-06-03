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
    <link rel="stylesheet" href="css/css/forgot.css">
	
	<!-- logo -->
	<link rel="icon" href="img/DTH.png" type="image/x- icon">
</head>
<body>
<?php
    $error = '';
    $email = '';
    $message ='';
    if (isset($_POST['email'])) {
        $email = $_POST['email'];

        if (empty($email)) {
            $error = 'Please enter your email';
        }
        else if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
            $error = 'This is not a valid email address';
        }
        else {
            // reset password
            reset_password($email);
            $message = 'Vui lòng vào email để xác thực đổi mật khẩu';
        }
    }
?>
<div class="box">
    <h2 class="text-center text-secondary text-light mt-4">Khôi phục tài khoản</h2>
    <form method="post" action="" class="form-forgot text-light">
        <div class="inputB">
            <input name="email" id="email" type="text" required=''>
            <label for="email">Email</label>
        </div>
        <div class="form-group">
            <p><?= $message ?></p>
        </div>
        <div class="form-group">
            <?php
                if (!empty($error)) {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
            ?>
            <button class="btn btn-primary btn-block">Tiếp theo</button>
        </div>
    </form>

</div>

</body>
</html>
