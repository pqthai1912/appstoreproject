<?php
require_once ('db.php');

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
    <link rel="stylesheet" href="css/css/register.css">
    <link rel="stylesheet" href="css/css/style.css">
	
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

<!--phần nạp-->
<?php
$error = '';
$mathe = '';
$series = '';
$menhgia = '';
$mes = '';

if(isset($_GET["id"])){
    $id_convert=$_GET["id"];
    settype($id_convert,"int");

    if (isset($_POST['mathe']) && isset($_POST['series']) && isset($_POST['menhgia'])){
        $mathe = $_POST['mathe'];
        $series = $_POST['series'];
        $menhgia = $_POST['menhgia'];
        if (empty($mathe)) {
            $error = 'Vui lòng nhập mã thẻ';
        }
        else if (empty($series)) {
            $error = 'Vui lòng nhập mã series';
        }
        else if (empty($menhgia)) {
            $error = 'Vui lòng chọn mệnh giá';
        }
        else {
            // kiểm tra xem mã có hợp lệ
            $sql = "select username from account where id = '".$id_convert."'";
            $result = $conn->query($sql);

            if($result->num_rows>0) {
                $row =$result->fetch_assoc();
                $res = check_Charge($mathe,$series,$menhgia);
                if ($res['code'] == 0){
                    $result = charge($row['username'],$menhgia,$mathe);
                    if ($result['code'] == 0){
                        $mes = "Nạp tiền thành công!";
                        echo "<script>alert('$mes');</script>";
                    }
                    else{
                        $error = 'Lỗi đã xảy ra, vui lòng thử lại';
                    }

                }
                else if($res['code'] == 1){
                    $error = 'Mã thẻ không tồn tại';
                }else  if($res['code'] == 2){
                    $error = 'Số series không chính xác';
                }else  if($res['code'] == 3){
                    $error = 'Nhập sai mệnh giá';
                }else { 
                    $error = 'Thẻ đã được sử dụng';
                }
            }else{
                $error = 'Lỗi đã xảy ra, vui lòng thử lại';
            }


        }

    }
}
else{
    die('Mã thẻ không hợp lệ');
}
?>
<session>
    <a class="edit_Profile mr-5" href="index.php">Quay lại</a>
    <div class="box">
        <h2 class="text-center mt-4">Nạp thẻ</h2>
        <form method="post" action="" novalidate class="form-register text-light">
            <div class="inputB">
                <input value="<?= $mathe?>" name="mathe" type="text" id="mathe" required=''>
                <label for="mathe">Mã thẻ</label>

            </div>
            <div class="inputB">
                <input  value="<?= $series?>" name="series" type="text" id="series" required=''>
                <label for="series">Mã series</label>
            </div>
            <div class="form-group">
                    <select name="menhgia">
                        <option value="" selected>Chọn mệnh giá</option>
                        <option value="50000">50,000 VNĐ</option>
                        <option value="100000">100,000 VNĐ</option>
                        <option value="200000">200,000 VNĐ</option>
                        <option value="500000">500,000 VNĐ</option>
                    </select>
            </div>
            <div class="form-group">
                <?php
                if (!empty($error)) {
                    echo "<div class='alert alert-danger requirements'>$error</div>";
                }
                ?>
                <button type="submit" class="btn btn-success px-5 mt-3 mr-2">Nạp</button>
                <button type="reset" class="btn btn-danger px-5 mt-3">Reset</button>
            </div>
        </form>
    </div>

</session>
<!--ket thuc phan nạp-->

<!-- Js Plugins -->
<script src="js/js/main.js"></script>


</body>

</html>
