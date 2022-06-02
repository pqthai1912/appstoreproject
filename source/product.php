<?php
require_once('db.php');
$conn = open_database();
?>
<div class="container">
    <div class="row">
        <div class="col-lg-8">

            <!-- sản phẩm game -->
            <div class="trending__product">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <div class="section-title">
                            <h4>Trò chơi hàng đầu</h4>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="btn__all">
                            <a href="./topGames.php" class="primary-btn">Xem tất cả <span class="arrow_right"></span></a>
                        </div>
                    </div>
                </div>
                <!-- sản phẩm -->
                <div class="row">
                    <?php
                        $sql="SELECT * FROM apps,categories WHERE apps.maloai = 1 and apps.theloai = categories.theloai ORDER BY apps.luottai DESC LIMIT 0,3";
                        $res = $conn->query($sql);
                        if($res->num_rows>0){
                            while ($row = $res->fetch_assoc()){
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
            </div>

            <!-- sản phẩm apps -->
            <div class="popular__product">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <div class="section-title">
                            <h4>Ứng dụng thịnh hành</h4>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="btn__all">
                            <a href="./topApps.php" class="primary-btn">Xem tất cả <span class="arrow_right"></span></a>
                        </div>
                    </div>
                </div>
                <!-- hiển thị ứng dụng-->
                <div class="row">
                    <?php
                    $sql="SELECT * FROM apps,categories WHERE apps.maloai = 0 and apps.theloai = categories.theloai ORDER BY apps.luottai DESC LIMIT 0,3";
                    $res = $conn->query($sql);
                    if($res->num_rows>0){
                        while ($row = $res->fetch_assoc()){
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
            </div>

            <!-- sản phẩm phát hành gần đây -->
            <div class="recent__product">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <div class="section-title">
                            <h4>Phát hành trong năm nay</h4>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="btn__all">
                            <a href="./release.php" class="primary-btn">Xem tất cả<span class="arrow_right"></span></a>
                        </div>
                    </div>
                </div>

                <!-- hiển thị ứng dụng mới phát hành trong năm nay-->
                <div class="row">
                    <?php
                    $sql3="SELECT * FROM apps,categories WHERE apps.theloai = categories.theloai and namph = '2021' LIMIT 0,6";
                    $res3 = $conn->query($sql3);
                    if($res3->num_rows>0){
                        while ($row = $res3->fetch_assoc()){
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

            </div>
        </div>

        <!-- cột bên phải-->
        <div class="col-lg-4 col-md-6 col-sm-8">
            <div class="product__sidebar ml-5">
                <div class="product__sidebar__comment">
                    <div class="section-title">
                        <h5>Được tải nhiều nhất</h5>
                    </div>
                    
                    <?php
                    $sql4="SELECT * FROM apps,categories WHERE apps.theloai = categories.theloai ORDER BY apps.luottai DESC LIMIT 0,6";
                    $res4 = $conn->query($sql4);
                    if($res4->num_rows>0){
                        while ($row = $res4->fetch_assoc()){
                            ?>
                            <div class="product__sidebar__comment__item mb-4">
                                <div class="product__sidebar__comment__item__pic">
                                    <img class="bar_right" src="<?=$row['hinhanh']?>" alt="">
                                </div>
                                <div class="product__sidebar__comment__item__text">
                                    <ul>
                                        <li><?=$row['ten']?></li>
                                    </ul>
                                    <h5><a href="/appPage.php?id=<?=$row['id']?>"><?=$row['tenapp']?></a></h5>
                                    <span><i class="fa fa-eye"></i> <?=$row['luottai']?></span>
                                </div>
                            </div>
                            <?php
                        }
                    }?>


                </div>
            </div>
        </div>
    </div>
</div>