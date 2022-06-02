<?php
    include '../../../../connect.php';

    $sql2 = "SELECT COUNT(*) FROM product";
    $kq2 = mysqli_query($mysqli,$sql2);
?>

<?php
if (isset($_GET["delete_id"])) {
    $id = $_GET['delete_id'];

    //BỎ công khai khỏi apps
    $result = $mysqli->query("SELECT name FROM product WHERE id = '".$id."'") or die($mysqli->error());
    if($result->num_rows > 0) {
        $row1 = $result->fetch_array();
        $mysqli->query("DELETE FROM apps WHERE tenapp = '" . $row1['name'] . "'") or die($mysqli->error());
        //Gỡ xuống
    }

    $sql = "DELETE FROM product WHERE id = '$id'";
    mysqli_query($mysqli, $sql);

    echo "<script> window.location='UploadApp.php'; </script>";
}

if (isset($_GET["check_id"])) {
    $id = $_GET['check_id'];
    $mysqli->query("UPDATE product SET active = 'Đang chờ duyệt' WHERE id = '" . $id . "'") or die($mysqli->error());
    echo "<script> window.location='UploadApp.php'; </script>";
}
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Xtreme lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Xtreme admin lite design, Xtreme admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Xtreme Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <link rel="canonical" href="https://www.wrappixel.com/templates/xtreme-admin-lite/" />
    <link href="../../dist/css/style.min.css" rel="stylesheet">
	<title>DTH store</title>
	<style>
        .item img {
            height: 100px;
        }
		#edit{
			margin-bottom:10px;
		}
    </style>
	
	<!-- logo -->
    <link rel="icon" href="../../../../img/DTH.png" type="image/x- icon">
    
</head>

<body>
<!--        header-->
<?php require_once ('header.php'); ?>
<!--            end header-->
        
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-5">
                        <h4 class="page-title"></h4>
                        
                    </div>
                    
                </div>
            </div>
            
        <div class="container-fluid">
                
            <div class="row">
                    <div class="col-12">
						<div class="container">
							<div class="row my-5">
								<div class="col-10">
								</div>
								<div class="col-2">
									<a class="btn btn-lg btn-primary" href="add_product.php?">Thêm ứng dụng</a>
								</div>
								
							</div>
							<div class="row">
								<div class="col">
									<table class="table table-hover table-striped table-bordered text-center" >  
										<thead>
											<tr>
												<th>Icon</th>
												<th>Tên ứng dụng</th>
												<th>Kiểu</th>
                                                <th>Thể loại</th>
												<th>Chi phí tải</th>
												<th>Mô tả</th>
												<th>Tình trạng</th>
												<th>Tùy chỉnh</th>
											</tr>
										</thead>
										<tbody>
										<?php
                                        $sql = "SELECT * FROM product WHERE nhaphattrien = '".$_SESSION['user']."'";
                                        $kq = mysqli_query($mysqli,$sql);
										while($row =mysqli_fetch_assoc($kq)){
											?>
											<tr class="item">
												<td style="display: none;" class="product_id" class=" align-middle"><?php echo $row['id'];?></td>
												<td  class=" align-middle"><img src="../../../../<?php echo $row['image'];?>"></td>
												<td  class=" align-middle"><?php echo $row['name'];?></td>
												<td  class=" align-middle"><?php echo $row['type'];?></td>
                                                <td  class=" align-middle"><?php echo $row['theloai'];?></td>
												<td class=" align-middle"><?php echo $row['price'];?> VNĐ</td>
												<td class=" align-middle"><?php echo $row['description'];?></td>
												<td class=" align-middle"><?php echo $row['active'];?></td>
												
                                                <td class=" align-middle">
                                                    <?php

                                                        if($row['active'] == 'Bản nháp'){
                                                            ?>
                                                            <a class="btn btn-success btn-sm" href="UploadApp.php?check_id=<?php echo $row['id']; ?>" name="check" type="submit"><i class="fa fa-trash-o" aria-hidden="true">
                                                                    <i class="fas fa-paper-plane"></i><br> Yêu cầu duyệt
                                                            </a> <br>
                                                            <?php
                                                        }

                                                    ?>


													<a class="btn btn-sm btn-dark" id="edit" href="update_product.php?id=<?php echo $row['id']; ?>">
														<i class="fas fa-edit"></i><br> Chỉnh sửa
													</a>
													
													<a class="btn btn-danger btn-sm" Onclick="return ConfirmDelete();" href="UploadApp.php?delete_id=<?php echo $row['id']; ?>" name="delete" type="submit"><i class="fa fa-trash-o" aria-hidden="true">
															<i class="fas fa-trash"></i><br> Gỡ xuống
													</a>
												</td>
											</tr>
										<?php
											}
										?>
										</tbody>

									</table>
								</div>
							</div>
							<div class="text-right">
                                <?php
                                    $result1="SELECT count(*) as 'tong' from product where nhaphattrien = '".$_SESSION['user']."'";
                                    $kq3 = mysqli_query($mysqli,$result1); //chuyen hoa sql thanh php
                                    $data=mysqli_fetch_assoc($kq3);
                                ?>
								Có <span class="badge badge-danger badge-pill"><?= $data['tong']?></span> ứng dụng trong danh sách
							</div>
						</div>

                    </div>
            </div>
        </div>   
    </div>
    <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../dist/js/app-style-switcher.js"></script>
    <script src="../../dist/js/waves.js"></script>
    <script src="../../dist/js/sidebarmenu.js"></script>
    <script src="../../dist/js/custom.js"></script>
</body>

</html>