<?php
// Nếu người dùng ấn search thì gửi lên server
require_once ('db.php');

if (isset($_REQUEST['send']))
{
//chống sql injection
$search = addslashes($_GET['search']);

// Quay lai trang hien tai neu nguoi dung khong nhap gi cả
    if (empty($search)) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }else{
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
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/plyr.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/css/style.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
	
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

<!-- thể loại begin -->
<section>
    <div class="container">
        <div class="header__nav mt-3">
            <nav class="header__menu">
                <ul>
                    <li><a href="index.php">Trang chủ</a></li>
                    <li><a href="">Thể loại <span class="arrow_carrot-down"></span></a>
                        <ul class="dropdown">
                            <li ><a href="./applications.php">Ứng dụng</a></li>
                            <li><a href="./games.php">Trò chơi</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</section>
<!-- thể loại end -->

<!--tất cả game thịnh hành-->
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- sản phẩm game -->
                <div class="trending__product">
                    <?php
                                // Dùng câu lênh like

                                $sql = "select * from `apps` where `tenapp` like '%".$search."%'";
                                // Kết nối sql
                                $conn = open_database();

                                // Thực thi câu truy vấn (dung cai nay moi get du lieu chinh xac)
                                $res = mysqli_query($conn,$sql);

                                if (mysqli_num_rows($res) > 0 && $search != "")
                                {
                                    ?>
                                    <div class="row">
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <div class="section-title">
                                                <h4>Có <?=$res->num_rows?> kết quả với từ khóa <?=$search?>"</h4>
                                            </div>
                                        </div>
                                    </div>
                                <div class="row">
                                    <?php
                                    // Vòng lặp while & mysql_fetch_assoc dùng để lấy toàn bộ dữ liệu có trong table và trả về dữ liệu ở dạng array.
                                    while ($row = $res->fetch_assoc()) {
                                    ?>
                                    <!-- sản phẩm -->
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="product__item">
                                            <div class="product__item__pic set-bg" data-setbg="<?=$row['hinhanh']?>">
                                                <div class="view"><a href="/appPage.php?id=<?=$row['id']?>"><i class="fa fa-eye" aria-hidden="true"></i></a></div>
                                            </div>
                                            <div class="product__item__text ml-4 mb-5">
                                                <h5><a href="/appPage.php?id=<?=$row['id']?>"><?=$row['tenapp']?></a></h5>
                                            </div>
                                            <div class="product__item__text ml-4">
                                                <h5><a href="/appPage.php?id=<?=$row['id']?>"><?=$row['danhgia']?></a></h5>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                    }
                            }
                            else {
                                ?>
                                <div class="row">
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                        <div class="section-title">
                                            <h4>Có <?=$res->num_rows?> kết quả với từ khóa <?=$search?>"</h4>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                        }
                    }?>
                            </div>


                </div>
            </div>
        </div>
    </div>





</section>
<!--kết thúc-->

<!-- Footer Section Begin -->
<footer class="footer">
    <?php require_once("footer.php");?>
</footer>
<!-- Footer Section End -->


<!-- Js Plugins -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/player.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/mixitup.min.js"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/main.js"></script>
<script src="js/js/main.js"></script>


</body>

</html>