<?php
require_once('db.php');
$conn = open_database();
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
    <?php require_once("typeApp.php") ?>
</section>
<!-- thể loại end -->

<!--tất ứng dụng thịnh hành-->
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- sản phẩm ứng dụng -->
                <div class="trending__product">

                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <div class="section-title">
                                <?php
                                if(isset($_GET["theloai"])){
                                $sql = "SELECT ten FROM categories WHERE theloai = '".$_GET["theloai"]."'";
                                $res = $conn->query($sql);
                                if($res->num_rows>0){
                                $row =$res->fetch_assoc();
                                ?>
                                <h4><?= $row["ten"]?></h4>
                            </div>
                        </div>
                    </div>
                    <?php
                    
                    
                    }
                    ?>

                    <!-- sản phẩm -->
                    <div class="row">
                        <?php
                        $sql2 = "SELECT * FROM apps WHERE apps.maloai = 0 and apps.theloai = '".$_GET["theloai"]."'";
                        $res2 = $conn->query($sql2);
                        if($res2->num_rows>0){
                            while ($row =$res2->fetch_assoc()){
                                ?>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg" data-setbg="<?=$row['hinhanh']?>">
                                            <div class="view"><a href="/appPage.php?id=<?=$row['id']?>"><i class="fa fa-eye" aria-hidden="true"></i></a></div>
                                        </div>
                                        <div class="product__item__text ml-4 mb-5">
                                            <h5><a href="/appPage.php?id=<?=$row['id']?>"><?=$row['tenapp']?></a></h5>
                                        </div>
                                        <div class="product__item__text ml-4">
                                        <h5><a href="/appPage.php?id=<?=$row['id']?>"><i class="fa fa-download" aria-hidden="true"></i> <?=$row['luottai']?></a></h5>
                                        </div>
                                    </div>
                                </div>

                                <?php
                            }
                        }?>
                    </div>

                    <?php
                    }
                    else{?>
                                <h4>Tất cả ứng dụng</h4>
                            </div>
                        </div>
                    </div>
                    <!-- sản phẩm -->
                    <div class="row">
                        <?php
                        $sql="SELECT * FROM apps,categories WHERE apps.maloai = 0 and apps.theloai = categories.theloai ORDER BY apps.luottai DESC";
                        $res = $conn->query($sql);
                        if($res->num_rows>0){
                            while ($row =$res->fetch_assoc()){

                                ?>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg" data-setbg="<?=$row['hinhanh']?>">
                                            <div class="view"><a href="/appPage.php?id=<?=$row['id']?>"><i class="fa fa-eye" aria-hidden="true"></i></a></div>
                                        </div>
                                        <div class="product__item__text ml-4 mb-5">
                                            <h5><a href="/appPage.php?id=<?=$row['id']?>"><?=$row['tenapp']?></a></h5>
                                        </div>
                                        <div class="product__item__text ml-4">
                                        <h5><a href="/appPage.php?id=<?=$row['id']?>"><i class="fa fa-download" aria-hidden="true"></i> <?=$row['luottai']?></a></h5>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }?>
                    </div>

                    <?php
                    }
                    ?>

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
