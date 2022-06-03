<?php
    session_start();
    session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>DTH store</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
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
  <div class="box">
      <div class="box-logout text-light mt-3">
          <h2>Đăng xuất thành công</h2>
          <p>Tài khoản của bạn đã được đăng xuất khỏi hệ thống.</p>
          <p>Nhấn <a href="index.php">vào đây</a> để trở về trang chủ, hoặc trang web sẽ tự động chuyển hướng sau <span id="counter" class="text-danger">10</span> giây nữa.</p>
          <div class = "text-center">   
            <a class="btn btn-success px-5" href="login.php">Đăng nhập</a>
          </div>
      </div>
  </div>
<script>
  let duration = 10;
  let countDown = 10;
  let id = setInterval(() => {

      countDown --;
      if (countDown >= 0) {
          $('#counter').html(countDown);
      }
      if (countDown == -1) {
          clearInterval(id);
          window.location.href = 'login.php';
      }

  }, 1000);
</script>
</body>
</html>
