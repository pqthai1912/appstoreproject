<?php
session_start();
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Xtreme lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Xtreme admin lite design, Xtreme admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description" content="Xtreme Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <link rel="canonical" href="https://www.wrappixel.com/templates/xtreme-admin-lite/" />
    <!-- Custom CSS -->
    <link href="../../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../../dist/css/style.min.css" rel="stylesheet">

    <title>DTH Store</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link href="../../dist/css/card.css" rel="stylesheet">
	
	<!-- logo -->
    <link rel="icon" href="../../../../img/DTH.png" type="image/x- icon">
</head>


<body>
    <!-- header -->
    <?php require_once("header.php") ?>
    <!-- header -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row align-items-center">
                <div class="col-5">
                    <h4 class="page-title"></h4>

                </div>

            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->

        <!-- Container fluid  -->

        <div class="container">
            <div class="row justify-content-center w-100">
                <div class="col-md-1 col-lg-1"> </div>
                <div class="col-md-9 col-lg-10 d-flex justify-content-center">
                    <table class="table-info table-bordered table-hover table-striped">
                        <thead class="bg-success text-light">
                            <tr>
                                <th scope="col">Số lượng người dùng</th>
                                <th scope="col">Tổng ứng dụng</th>
                                <th scope="col">Danh sách thể loại</th>
                                <th scope="col">Số ứng dụng mỗi thể loại</th>
                                <th scope="col" >Danh sách ứng dụng được tải-mua nhiều nhất</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class = 'text-light'>
                                <td><a href="./thongke.php?id=1" type="button" class="btn btn-primary">Xem chi tiết</a></td>
                                <td><a href="./thongke.php?id=2" type="button" class="btn btn-primary">Xem chi tiết</a></td>
                                <td><a href="./thongke.php?id=3" type="button" class="btn btn-primary">Xem chi tiết</a></td>
                                <td><a href="./thongke.php?id=4" type="button" class="btn btn-primary">Xem chi tiết</a></td>
                                <td><a href="./thongke.php?id=5" type="button" class="btn btn-primary">Xem chi tiết</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="row w-100 mt-5 d-flex justify-content-center">
                    <div class="col-md-1 col-lg-1"> </div>
                    <div class="col-md-9 col-lg-10 ">
                    <?php
                        require_once ("./summary.php");
                    ?>
                    </div>
                </div>
            </div>

            
            
        </div>

        <!-- ============================================================== -->
        <div>
        <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap tether Core JavaScript -->
        <script src="../../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../../dist/js/app-style-switcher.js"></script>
        <!--Wave Effects -->
        <script src="../../dist/js/waves.js"></script>
        <!--Menu sidebar -->
        <script src="../../dist/js/sidebarmenu.js"></script>
        <!--Custom JavaScript -->
        <script src="../../dist/js/custom.js"></script>
        <!--This page JavaScript -->
        <!--chartis chart-->
        <script src="../../assets/libs/chartist/dist/chartist.min.js"></script>

        <script src=../../dist/js/main.js></script>
</body>

</html>