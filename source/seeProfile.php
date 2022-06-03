<?php
require_once ('db.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Anime Template">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DTH store</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap"
          rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/css/register.css">
    <link rel="stylesheet" href="css/css/style.css">
	
	<!-- logo -->
	<link rel="icon" href="img/DTH.png" type="image/x- icon">
</head>

<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Header Section Begin -->
<header class="header">
    <?php require_once("header.php")?>
</header>
<!-- Header End -->

<!--phan chinh xem hồ sơ-->
<session>
<div class="container mt-3 ">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="card" id="shadow1">
                    <div class="card-body">
                        <?php
                            $sql="SELECT * FROM account WHERE username = '".$_SESSION['user']."'";
                            $res = $conn->query($sql);
                            if($res->num_rows > 0){
                                $row = $res->fetch_assoc();
                                $date = date("d-m-Y", strtotime($row['ngaysinh']));  
                            ?>
                            <h1>Hồ sơ cá nhân</h1>
                        <div class="card-title mb-4">
                            <img src="<?=$row['avatar']?>" class="img-thumbnail rounded-circle" alt="..."/>
                            <div class="d-flex justify-content-start">
                                <div class="ml-auto">
                                    <button class="btn btn-primary"><a href="./editProfile.php?id=<?=$row['id']?>">Chỉnh sửa hồ sơ</a></button>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Thông tin cơ bản</a>
                                    </li>
                                </ul>
                                <div class="tab-content ml-1" id="myTabContent">

                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">Họ tên</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            <?=$row['firstname']?> <?=$row['lastname']?>
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">Ngày sinh</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            <?=$date?>
                                        </div>
                                    </div>
                                    <hr />
                                    
                                    
                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">Email</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            <?=$row['email']?>
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">Số dư</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            <?=$row['sodu']?> VNĐ
                                        </div>
                                    </div>
                                    <hr />
    
                                </div>
                            </div>
                        </div>
                            <?php
                            
                            }
                        ?>


                    </div>

                </div>
            </div>
        </div>
    </div>
</session>
<!--ket thuc phan xem hồ sơ-->

<!-- Js Plugins -->
<script src="js/js/main.js"></script>

</body>

</html>
