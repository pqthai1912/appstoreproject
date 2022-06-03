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

    <header class="header">
        <?php require_once("header.php")?>
    </header>

    <!-- thể loại begin -->
    <section>
        <div class="container">
            <div class="header__nav mt-3">
                <nav class="header__menu">
                    <ul>
                        <li><a href="index.php">Trang chủ</a></li>
                        <li><a href="#">Thể loại <span class="arrow_carrot-down"></span></a>
                            <ul class="dropdown">
                                <li ><a href="./applications.php">Ứng dụng</a></li>
                                <li><a href="./games.php">Trò chơi</a></li>
                                <li><a href="Type.php?tl=0">Miễn phí</a></li>
                                <li><a href="Type.php?tl=1">Tính phí</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>
    <!-- thể loại end -->

    <!-- APP Section Begin -->
    <section class="anime-details spad">
        <div class="container" id="appPage">
            <div class="anime__details__content">
                <div class="row">
                    <?php
                    //chuyen id ve so nguyen
                    if(isset($_GET["id"])){
                        $id_convert=$_GET["id"];
                        settype($id_convert,"int");
                    }else{
                        $id_convert=0;
                    }
                    $sql="SELECT * FROM apps WHERE id = '".$id_convert."'";
                    $res = $conn->query($sql);
                    if($res->num_rows>0){
                        $row = $res->fetch_assoc();
                        ?>

                    <div class="col-lg-3">
                        <div class="anime__details__pic set-bg" data-setbg="<?=$row['hinhanh']?>"></div>
                    </div>
                    <div class="col-lg-9">
                        <div class="anime__details__text">
                            <div class="anime__details__title">
                                <h3><?=$row['tenapp']?></h3>
                            </div>
                            <div class="anime__details__rating">
                            </div>
                            <div class="anime__details__widget">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <?php
                                                $sql1="SELECT * FROM categories WHERE theloai = '".$row['theloai']."'";
                                                $res1 = $conn->query($sql1);
                                                if($res1->num_rows>0) {
                                                    $row1 = $res1->fetch_assoc();
                                                    ?>
                                            <li><span>Thể loại:</span> <?=$row1['ten']?></li>
                                                <?php

                                                }?>

                                            <li><span>Nhà phát triển: </span><?=$row['nhaphattrien']?></li>        
                                            <li><span>Năm phát hành: </span><?=$row['namph']?></li>

                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <li><span>Phiên bản:</span><?=$row['phienban']?></li>
                                            <li><span>Lượt tải:</span> <?=$row['luottai']?></li>
                                            <li><span>Kiểu:</span> <?=$row['phi']?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="anime__details__btn">
                            <!--kiem tra phí-->
                                <?php
                                    if($row['traphiud'] == 0){
                                        ?>
                                        <a href="./install.php?file=<?=$row['link']?>" class="watch-btn"><span>Cài đặt</span></a>
                                        <?php
                                    }else{
                                        if(isset($_SESSION['user'])){
                                            $sql4="SELECT * FROM down_apps WHERE username = '".$_SESSION['user']."' and maapp = '".$id_convert."'";
                                            $res4 = $conn->query($sql4);
                                            if($res4->num_rows>0) {
    //                                            Do đã mua ứng dụng
                                                ?>
                                                <a href="./install.php?file=<?=$row['link']?>" class="watch-btn"><span>Cài đặt</span></a>
                                                <?php
                                            }else{
                                                // chưa mua ứng dụng lần nào
                                                ?>
                                                <a href="./install.php?file=<?=$row['link']?>" class="watch-btn"><span><?=$row['traphiud']?> VNĐ</span></a>
                                                <?php
                                            }
                                        }else{
                                            ?>
                                                <a href="./install.php?file=<?=$row['link']?>" class="watch-btn"><span><?=$row['traphiud']?> VNĐ</span></a>
                                            <?php

                                        }
                                    }
                                ?>

                            </div>
                        </div>
                    </div>

                </div>
                <!--END-->

                <!-- Mô tả nội dung -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 border-bottom">
                        <div class="recent__product">
                            <div class="row">
                                <div class="col-lg-12 col-md-11 col-sm-12 mt-5">
                                    <div class="section-title">
                                        <h2 class="text-success"><i class="fa fa-info-circle "></i> Thông tin chi tiết</h2>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 ml-2">
                                    <p class="text-light"><?= $row['mota']?></p>
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>
                <!-- Kết thúc Mô tả nội dung -->                   

                
				<!--CONTENT-->
                <div class="row">
                
					<div class="col-lg-8 col-md-12">

                        <!--RATINGS-->
						<?php require_once('show_rating.php');?>
                        <!--END RATINGS-->

                        <!--Đề xuất npt-->
                        <div class="recent__product">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8 mt-5">
                                    <div class="section-title">
                                        <h5>Đề xuất cùng nhà phát triển</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <?php
                                $sql3="SELECT * FROM apps,categories WHERE apps.theloai = categories.theloai and nhaphattrien = '".$row['nhaphattrien']."' LIMIT 0,6";
                                $res3 = $conn->query($sql3);
                                if($res3->num_rows>0){
                                    while ($row3 = $res3->fetch_assoc()){
                                        ?>
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <div class="product__item">
                                                <div class="product__item__pic set-bg" data-setbg="<?=$row3['hinhanh']?>">
                                                    <div class="view"><a href="/appPage.php?id=<?=$row3['id']?>"><i class="fa fa-eye" aria-hidden="true"></i></a></div>
                                                </div>
                                                <div class="product__item__text ml-4 mb-5">
                                                    <h5><a href="/appPage.php?id=<?=$row3['id']?>"><?=$row3['tenapp']?></a></h5>
                                                </div>
                                                <div class="product__item__text ml-4">
                                                    <h5><a href="/appPage.php?id=<?=$row3['id']?>"><?=$row3['danhgia']?></a></h5>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }?>
                            </div>

                        </div>

                    </div>

                    <!--Đề xuất-->
                    <div class="col-lg-4 col-md-12">
                        <!--Đề xuất cùng loại-->
                        <div class="product__sidebar ml-2">
                            <div class="product__sidebar__comment">
                                <div class="section-title">
                                    <h5>Đề xuất cùng thể loại</h5>
                                </div>

                                <?php
                                $sql2="SELECT * FROM apps WHERE theloai = '".$row['theloai']."'";
                                $res2 = $conn->query($sql2);
                                if($res2->num_rows>0) {
                                    while($row2 = $res2->fetch_assoc()){
                                        if($row2['tenapp'] == $row['tenapp']){
                                            continue;
                                        }
                                        ?>
                                        <div class="product__sidebar__comment__item mb-4">
                                            <div class="product__sidebar__comment__item__pic">
                                                <img class="bar_right" src="<?=$row2['hinhanh']?>" alt="">
                                            </div>
                                            <div class="product__sidebar__comment__item__text">
                                                <ul>
                                                    <li><?=$row1['ten']?></li>
                                                </ul>
                                                <h5><a href="/appPage.php?id=<?=$row2['id']?>"><?=$row2['tenapp']?></a></h5>
                                                <span><i class="fa fa-eye"></i> <?=$row2['luottai']?></span>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                    }?>
                            </div>
                        </div>




                    </div>
				</div>
                
				<!--END CONTENT-->
            </div>
        </div>
        </section>
        <!-- Anime Section End -->

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
        <script src="js/rating.js"></script>

    </body>

    </html>