<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>DTH store</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="canonical" href="https://www.wrappixel.com/templates/xtreme-admin-lite/" />
    <link href="../../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="../../dist/css/style.min.css" rel="stylesheet">
    <style>
        .bg {
            background: #eceb7b;
        }
    </style>
	
	<!-- logo -->
    <link rel="icon" href="../../../../img/DTH.png" type="image/x- icon">
</head>
<body>
<!--        header-->
<?php require_once ('header.php'); ?>
<!--            end header-->

<?php
include '../../../../connect.php';
$id = $_GET['id'];
$sql2 = "SELECT * FROM product WHERE id = '$id'";
$query2 = mysqli_query($mysqli,$sql2);
$data=mysqli_fetch_assoc($query2);
    $error = '';
    $name = '';
    $price = '';
    $desc = '';
	$type='';
	$theloai = '';
	$ungdung = '';
    if(isset($_SESSION['user'])){
        if (isset($_POST['name']) && isset($_POST['fix']) && isset($_POST['price']) && isset($_POST['desc']))
        {
            $names = $_POST['name'];
            $price = $_POST['price'];
            $desc = $_POST['desc'];
            $type = $_POST['type'];
            $theloai = $_POST['theloai'];
            $maxfilesize   = 800000000;

            if (empty($names)) {
                 $error = 'Hãy nhập tên ứng dụng';
            }
            else if (intval($price) < 0) {
                 $error = 'Giá của ứng dụng không hợp lệ';
            }
            else if (intval($price) < 1000) {
                 $error = 'Giá ứng dụng phải trên 1000';
            }
            else if (empty($desc)) {
                 $error = 'Hãy nhập mô tả của ứng dụng';
            }
            else if (empty($type)) {
                 $error = 'Hãy chọn kiểu của ứng dụng';
            }
            else if (empty($theloai)) {
                 $error = 'Hãy chọn thể loại của ứng dụng';
            }
            else if ($_FILES['image']['error'] != UPLOAD_ERR_OK) {
                 $error = 'Vui lòng upload ảnh của ứng dụng';
            }
            else if ($_FILES['ungdung']['error'] != UPLOAD_ERR_OK) {
                $error = 'Vui lòng upload file.apk/file.zip của ứng dụng';
            }
            else if ($_FILES["ungdung"]["size"] > $maxfilesize)
            {
                 $error ="Không được upload .apk/.zip lớn hơn $maxfilesize (bytes).";
            }
            else {
                if($type == 'Ứng dụng'){
                    $path = "img/apps/"; // Ảnh sẽ lưu vào thư mục images
                }else{
                    $path = "img/games/"; // Ảnh sẽ lưu vào thư mục images
                }

                $apk = "apk/";

                $tmp_name = $_FILES['image']['tmp_name'];
                $name = $_FILES['image']['name'];
                $image_url = $path.$name; // Đường dẫn ảnh lưu vào cơ sở dữ liệu
                $result3 = $mysqli->query("SELECT image FROM product where image = '$image_url'") or die($mysqli->error());

                $tmp_name1 = $_FILES['ungdung']['tmp_name'];
                $name1 = $_FILES['ungdung']['name'];
                $image_url1 = $name1; // Đường dẫn ảnh lưu vào cơ sở dữ liệu
                $result4 = $mysqli->query("SELECT image FROM product where apk = '$image_url1'") or die($mysqli->error());

                if($result3->num_rows > 0 ){
                    $error = 'Tên file ảnh đã tồn tại';
                }else if($result4->num_rows > 0){
                    $error = 'Tên file apk đã tồn tại';
                }
                else{
                    $sql = "UPDATE product SET name = '$names',type ='$type',price = '$price',description ='$desc',image ='$image_url',theloai='$theloai', apk = '$image_url1' WHERE id ='$id'";
                    $query = mysqli_query($mysqli,$sql);
                    // print_r($_FILES);
                    echo "<div class='container'><div class='row'>
                            <div class = 'col-lg-3'></div>
                                <div class = 'col-lg-6'>
                                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                        Cập nhật ứng dụng <strong>thành công</strong>!     
                                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                          <span aria-hidden='true'>&times;</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                          </div>";
                }

            }
        }
    }
?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 border rounded my-5 p-4  mx-3">
                <p class="mb-5"><a href="UploadApp.php">Quay lại</a></p>
                <h3 class="text-center text-secondary mt-2 mb-3 mb-3"></h3>
                <form method="post" action="" novalidate enctype="multipart/form-data">

                    <div class="form-group">
                        <input value="<?php echo $data['name'];?>" name="name" required class="form-control" type="hidden" placeholder="Tên ứng dụng" id="name">
                    </div>
                    <div class="form-group">
                        <label for="price">Giá bán</label>
                        <input value="<?php echo $data['price'];?>" name="price" required class="form-control" type="number" placeholder="Giá bán" id="price">
                    </div>
					<div class="form-group">
                        
                            <label class="form-label" for="inputZip">Kiểu</label>
                            <select class="form-control" aria-label="Default select example" name="type">
                                <option value="" selected>Chọn kiểu</option>
                                <option <?php if ($data['type'] == 'Ứng dụng') { echo ' selected="selected"'; } ?> value="Ứng dụng">Ứng dụng</option>
                                <option <?php if ($data['type'] == 'Trò chơi') { echo ' selected="selected"'; } ?> value="Trò chơi">Trò chơi</option>
                            </select>
						
					</div>

                    <div class="form-group">
                        <label class="form-label" for="inputZip">Thể loại</label>
                        <select class="form-control" aria-label="Default select example" name="theloai">
                            <option value="" selected>Chọn thể loại</option>
                        <?php
                            $result = $mysqli->query("SELECT * FROM categories") or die($mysqli->error());
                            if($result->num_rows > 0){
                                while ($row = $result->fetch_assoc()){
                                    ?>
                                    <option <?php if ($data['theloai'] == $row['ten']) { echo ' selected="selected"'; } ?> value="<?=$row['ten']?>"><?=$row['ten']?></option>
                                    <?php
                                }
                            }
                        ?>
                        </select>

                    </div>

                    <div class="form-group">
                        <label for="desc">Mô tả</label>
                        <textarea id="desc" name="desc" rows="4" class="form-control" placeholder="Mô tả"><?php echo $data['description'];?></textarea>
                    </div>
                    
                    <div class="form-group">
                        <div class="custom-file">
                            <input  name="image" type="file" class="custom-file-input" id="customFile" accept="image/gif, image/jpeg, image/png, image/bmp">
                            <label class="custom-file-label" for="customFile">Ảnh minh họa</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="custom-file">
                            <input  name="ungdung" type="file" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">File ứng dụng</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <?php
                            if (!empty($error)) {
                                echo "<div class='alert alert-danger'>$error</div>";
                            }
                        ?>
                        <button name="fix" type="submit" class="btn btn-primary px-5 mr-2">Sửa</button>
                    </div>
                </form>

            </div>
        </div>

    </div>

<script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../dist/js/app-style-switcher.js"></script>
<script src="../../dist/js/waves.js"></script>
<script src="../../dist/js/sidebarmenu.js"></script>
<script src="../../dist/js/custom.js"></script>
<script src="../../assets/libs/chartist/dist/chartist.min.js"></script>
<script src="../../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
<script src="../../dist/js/pages/dashboards/dashboard1.js"></script>

<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>

</body>
</html>

