<?php
require_once 'theloai.php'; 

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
        <div class="row justify-content-center w-100 ">
            <?php
            if(isset($_SESSION['message'])): ?>
                <div class="alert alert-<?=$_SESSION['msg_type']?> ">

                    <?php
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                    ?>

                </div>
            <?php endif ?>
        </div>
        <?php
        require_once('../../../../connect.php');
        $result = $mysqli->query ("SELECT * FROM categories") or die($mysqli->error);

        ?>


        <div class="row justify-content-center w-100 ">
            <div class= "col-lg-8">
                <table class="table-warning table-bordered table-hover table-striped .table-responsive">
                    <thead class="bg-dark text-light">
                    <tr>
                        <th scope="col">Tên thể loại</th>
                        <th scope="col">Kiểu</th>
                        <th scope="col" colspan="2">Tùy chỉnh</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['ten'];?> </td>
                            <td><?php
                                if ($row['app'] == 1 && $row['game'] == 0){
                                    echo "Ứng dụng";
                                }else{
                                    echo "Trò chơi";
                                }

                                ?> 
                            </td>
                            <td>
                                <a href="trangqltheloai.php?edit=<?php echo $row['theloai']; ?>" class="btn btn-info">Chỉnh sửa</a>
                                <a href="theloai.php?delete=<?php echo $row['theloai']; ?>" class="btn btn-danger">Xóa</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                    </tbody>
                </table>
            
            </div>
            <?php
                function pre_r($array){
                    echo '<pre>';
                    print_r($array);
                    echo '</pre>';
                }
            ?>
            <div class="col-lg-4">
                <form action="theloai.php?theloai=<?php echo $theloai;?>" method="POST" class="w-75 bg-white px-4 pt-3 pb-2">
                    <input type="hidden" name="theloai" value="<?php echo $theloai;?>">
                    <div class="form-group">
                        <label>Tên thể loại</label>
                        <input type="text" name="ten" value="<?php echo $ten;?>"  class="form-control"  placeholder="Nhập tên thể loại">
                    </div>
                    <div class="form-group">
                        <label>Kiểu</label><br>
                        <select name="kieu">
                            <option value="" selected>Chọn trạng thái</option>
                            <option value="0" <?php if ($kieu == 0) { echo ' selected="selected"'; } ?>>Ứng dụng</option>
                            <option value="1" <?php if ($kieu == 1) { echo ' selected="selected"'; } ?>>Trò chơi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <?php
                        if ($update == true):
                            ?>
                            <button type="submit" class="btn btn-info" name="update">Cập nhật</button>
                        <?php
                        else: ?>
                            <button type="submit" class="btn btn-primary" name="save">Tạo thể loại</button>
                        <?php endif; ?>
                    </div>
                </form>

            </div>
            
        </div>



        <!-- <div class="row justify-content-start mt-5">
            
        </div> -->
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