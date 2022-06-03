<?php
session_start();
require_once('../../../../db.php');
$conn = open_database();
?>

<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>

<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
     data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

    <header class="topbar" data-navbarbg="skin5">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
            <div class="navbar-header" data-logobg="skin5">

                <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                        class="ti-menu ti-close"></i></a>
            </div>

            <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                <ul class="navbar-nav float-start me-auto">
                    <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark"
                                                        href="javascript:void(0)"><i class="ti-search"></i></a>
                        <form class="app-search position-absolute">
                            <input type="text" class="form-control" placeholder="Search &amp; enter"> <a
                                class="srh-btn"><i class="ti-close"></i></a>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <aside class="left-sidebar" data-sidebarbg="skin6">
        <div class="scroll-sidebar">
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li>
                        <?php
                            if(isset($_SESSION['user'])){
                            $sql="SELECT * FROM account WHERE username = '".$_SESSION['user']."'";
                            $res = $conn->query($sql);
                            if($res->num_rows > 0){
                            $row = $res->fetch_assoc();
                            ?>

                            <div class="user-profile d-flex no-block dropdown m-t-20">
                                <div class="user-pic"><img src="../../../../<?=$row['avatar']?>" alt="users"
                                                           class="rounded-circle" width="40" /></div>
                                <div class="user-content hide-menu m-l-10">
                                    <a href="#" class="" id="Userdd" role="button"
                                       data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <h5 class="m-b-0 user-name font-medium"><?=$row['firstname']?> <?=$row['lastname']?><i class="fa fa-angle-down"></i></h5>
                                        <span class="op-5 user-email"><?=$row['email']?></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="Userdd">
                                        <a class="dropdown-item" href="../../../../seeProfile.php"><i class="ti-user m-r-5 m-l-5"></i>Hồ sơ cá nhân</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="../../../../logout.php"><i class="fa fa-power-off m-r-5 m-l-5"></i>Đăng xuất</a>
                                    </div>
                                </div>
                            </div>
                        <?php
                                }
                            }

                            else if(isset($_GET["id"])){
                                $sql="SELECT * FROM account WHERE id = '".$_GET["id"]."'";
                                $res = $conn->query($sql);
                                if($res->num_rows > 0){
                                    $row = $res->fetch_assoc();
                                ?>
                        <div class="user-profile d-flex no-block dropdown m-t-20">
                            <div class="user-pic"><img src="../../../../<?=$row['avatar']?>" alt="users"
                                                       class="rounded-circle" width="40" /></div>
                            <div class="user-content hide-menu m-l-10">
                                <a href="#" class="" id="Userdd" role="button"
                                   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <h5 class="m-b-0 user-name font-medium"><?=$row['firstname']?> <?=$row['lastname']?><i class="fa fa-angle-down"></i></h5>
                                    <span class="op-5 user-email"><?=$row['email']?></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="Userdd">
                                    <a class="dropdown-item" href="../../../../seeProfile.php"><i class="ti-user m-r-5 m-l-5"></i>Hồ sơ cá nhân</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="../../../../logout.php"><i class="fa fa-power-off m-r-5 m-l-5"></i>Đăng xuất</a>
                                </div>
                            </div>
                        </div>


                        <?php
                        }
                        }

                        ?>
                    </li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                 href="./home.php?id=<?=$row['id']?>" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                                class="hide-menu">Dashboard</span></a></li>

                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                 href="./UploadApp.php" aria-expanded="false"><i class="mdi mdi-file"></i><span
                                class="hide-menu">Quản lý và đăng tải ứng dụng</span></a></li>

                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                 href="./bill.php" aria-expanded="false"><i class="mdi mdi-border-all"></i><span
                                class="hide-menu">Quản lý đơn hàng</span></a></li>
                    <li class="sidebar-item">
                        <a href="../../../../index.php" class="sidebar-link waves-effect waves-dark sidebar-link">
                            <h5><i class="fa fa-desktop"></i><span
                                        class="hide-menu">Xem trang cửa hàng</span><i></i></h5>
                        </a
                    </li>
                </ul>

            </nav>
        </div>
    </aside>