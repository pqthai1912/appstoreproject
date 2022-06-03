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
    <meta name="keywords"
          content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Xtreme lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Xtreme admin lite design, Xtreme admin lite dashboard bootstrap 5 dashboard template">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="canonical" href="https://www.wrappixel.com/templates/xtreme-admin-lite/" />
    <link href="../../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="../../dist/css/style.min.css" rel="stylesheet">
	
	<!-- logo -->
    <link rel="icon" href="../../../../img/DTH.png" type="image/x- icon">
</head>

<body>
        <!-- header -->
        <?php require_once("header.php") ?>
        <!-- header -->

        <div class="container-fluid">
            <?php
            require_once ('../../../../connect.php');

            $id = '';
            $mes = '';
            $phi = '';
            $date = '';
            if(isset($_GET['pass'])){
                $id = $_GET['pass'];
                $result = $mysqli->query("SELECT * FROM product WHERE id = '".$id."'") or die($mysqli->error());

                if($result->num_rows > 0){
                    $row = $result->fetch_array();

                    if($row['active'] == 'Đang chờ duyệt') {
                        $mysqli->query("UPDATE product SET active = 'Đã được duyệt' WHERE id = '" . $id . "'") or die($mysqli->error());

                        //sau khi duyêt xong xóa khỏi danh sách chờ duyệt và chèn vào bảng apps
                        if($row['type'] == 'Trò chơi'){
                            $type = 1;
                        }else{
                            $type = 0;
                        }

                        if($row['price'] == 0){
                            $phi = 'Miễn phí';
                        }else{
                            $phi = 'Tính phí';
                        }

                        $result2 = $mysqli->query("SELECT theloai FROM categories WHERE ten = '".$row['theloai']."'") or die($mysqli->error());
                        if($result2->num_rows > 0) {
                            $row1 = $result2->fetch_array();
                            $date = date("Y");

                            $result3 = $mysqli->query("SELECT * FROM account WHERE username = '".$row['nhaphattrien']."'") or die($mysqli->error());

                            if($result3->num_rows > 0) {
                                $mysqli->query("INSERT INTO apps (tenapp,hinhanh,maloai,link,phienban,mota,theloai,nhaphattrien,phi,traphiud,namph)
                            VALUES ('".$row['name']."','".$row['image']."',".$type.",
                            '".$row['apk']."','1.0','".$row['description']."',
                            '".$row1['theloai']."','".$row['nhaphattrien']."','".$phi."',
                            ".$row['price'].",'".$date."') ")
                                or die($mysqli->error());



                                $row2 = $result3->fetch_array();

                                //gửi mail cho dev
                                passAppByAd($row2['email']);

                                $mes = 'Đã duyệt thành công!';
                            }
                        }
                    }

                }

            }

            if(isset($_GET['deny'])){
                $id = $_GET['deny'];
                $result = $mysqli->query("SELECT active FROM product WHERE id = '".$id."'") or die($mysqli->error());

                if($result->num_rows > 0){
                    $row = $result->fetch_array();

                    if($row['active'] == 'Đang chờ duyệt'){
                        $mysqli->query("UPDATE product SET active = 'Bị từ chối' WHERE id = '".$id."'") or die($mysqli->error());

                        //sau khi tu choi duyêt xong xóa khỏi danh sách chờ duyệt
                        $mes = 'Đã từ chối duyệt thành công!';

                    }
                }

            }
            ?>

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
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
        <div class="container-fluid">

                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
            <?php
            require_once ('./pass.php');
            ?>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
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
    <script src="../../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="../../dist/js/pages/dashboards/dashboard1.js"></script>

</body>

</html>