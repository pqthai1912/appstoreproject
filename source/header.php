<?php
require_once('db.php');
$conn = open_database();

?>
<div class="container">
    <div class="row">
        <div class="col-md-1 col-lg-2 text-light mt-3">
            <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <?php
                // neu nguoi dung chua dang nhap doi thanh the dang nhap
                    session_start();
                    if(!isset($_SESSION['user'])){
                ?>
                <a href="./login.php">Đăng nhập</a> 
                <a href="./register.php">Đăng ký</a>
                <a href="index.php">Trang chủ</a>
            </div>
            <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
        </div>
        <div class="col-md-6 col-lg-8 mt-4">
            <form action="search.php" method="get" class="justify-content-end">
                <input type="text" name="search" class="w-50" placeholder="Tìm kiếm ở đây"/>
                <button type="submit" name="send">tìm kiếm</button>
            </form>
        </div>
        <div class="col-md-4 col-lg-2 mt-3">
            <!--  logo-->
        </div>
                    <?php
                    }else{
                        $sql="SELECT * FROM account WHERE username = '".$_SESSION['user']."'";
                        $res = $conn->query($sql);
                        if($res->num_rows > 0){
                            $row = $res->fetch_assoc();
                    ?>

                <a href="#"><img src="<?=$row['avatar']?>" alt="Avatar" class="avatar"></a>
                <p class="ml-5 text-light"><?=$row['lastname']?> <?=$row['firstname']?></p>
                <a href="./logout.php">Đăng xuất</a><br>
                <a href="index.php">Trang chủ</a>
                <a href="./seeProfile.php">Xem hồ sơ</a>
                <a href="./charge.php?id=<?=$row['id']?>">Nạp tiền</a>
                <a href="./chargeHistory.php?id=<?=$row['id']?>">Lịch sử nạp</a>

                <?php
                // hiển thị nâng cấp khi chưa phải là dev
                    if($row['phanquyen'] == 2){
                        ?>
                        <a href="./upgrade.php?id=<?=$row['id']?>">Nâng lên developer</a>
                        <?php
                    }else if($row['phanquyen'] == 1){
                        ?>
                        <a href="role/dev/html/ltr/home.php?id=<?=$row['id']?>">Developer</a>
                        <?php
                    }else{
                        ?>
                        <a href="role/admin/html/ltr/trangchu.php?id=<?=$row['id']?>">Quản trị viên</a>
                        <?php
                    }
                ?>
                <a href="./listMyApp.php?id=<?=$row['id']?>">Ứng dụng của tôi</a>

            </div>
            <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
        </div>
        <div class="col-md-6 col-lg-8 mt-4">
            <form action="search.php" method="get" class="justify-content-end">
                <input type="text" name="search" class="w-50" placeholder="Tìm kiếm ở đây"/>
                <button type="submit" name="send">tìm kiếm</button>
            </form>
        </div>
        <div class="col-md-4 col-lg-2 mt-3">
            <!--  logo-->
            <div class="justify-content-end">
                <p class="text-light">Tiền trong ví: </p>
                <p class="text-light"><?=$row['sodu']?> VNĐ</p>
            </div>
        </div>
                <?php
                        }   
                    } 
                ?>
                

    </div>
    <div id="mobile-menu-wrap"></div>
</div>