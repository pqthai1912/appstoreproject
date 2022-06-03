<?php
    require_once('db.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>DTH store</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
      integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
      crossorigin="anonymous"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/css/logout.css"/>
	
	<!-- logo -->
	<link rel="icon" href="img/DTH.png" type="image/x- icon">
  </head>
  <body>
  <?php
    $error = '';
    $message ='';
    if (isset($_GET['email']) && isset($_GET['token'])){
      $email = $_GET['email'];
      $token = $_GET['token'];

      if (filter_var($email, FILTER_VALIDATE_EMAIL) === false){
        $error = 'Invalid email address';
      }else if (strlen($token) != 32){
        $error = 'Invalid token format';
      }
      else{
        $result = activeAccount($email, $token);
        if ($result['code'] == 0){
          $message = "Your account has been activated successfully.";
        }else{
          $error = $result['error'];
        }
      }
    }else{
      $error = 'Invalid activation url';
    }
  
  ?>
  <?php
    if(!empty($error)){
      ?>
        <div class="box">
          <div class="box-logout text-light mt-5">
            <h2>Kích hoạt tài khoản</h2>
            <p class="text-danger"><?= $error ?></p>
            <p>Vui lòng nhấn <a href="login.php">vào đây</a> để đăng nhập.</p>
            <div class = "text-center">   
              <a class="btn btn-success px-5" href="login.php">Đăng nhập</a>
            </div>          
          </div>
        </div>
  <?php
    }else{
        ?>
        <div class="box">
            <div class="box-logout text-light mt-5">
              <h2>Kích hoạt tài khoản</h2>
              <p class="text-success">Chúc mừng! Tài khoản của bạn đã được kích hoạt.</p>
              <p>Vui lòng nhấn <a href="login.php">vào đây</a> để đăng nhập.</p>
              <div class = "text-center">   
                <a class="btn btn-success px-5" href="login.php">Đăng nhập</a>
              </div> 
            </div>
       </div>
   <?php
    }
  ?>

  </body>
</html>
