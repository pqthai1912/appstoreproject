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

<!--phan chinh sua-->
<?php
$error = '';
$first = '';
$last = '';
$birth = '';
$avatar='';
$mes = '';

if(isset($_GET["id"])){
    $id_convert=$_GET["id"];
    settype($id_convert,"int");

    if (isset($_POST['first']) && isset($_POST['last']) && isset($_POST['birth'])
        && isset($_POST['avatar'])){
        $first = $_POST['first'];
        $last = $_POST['last'];
        $birth = $_POST['birth'];
        $avatar = $_POST['avatar'];

        if (empty($first)) {
            $error = 'Vui l??ng nh???p h??? c???a b???n';
        }
        else if (empty($last)) {
            $error = 'Vui l??ng nh???p t??n c???a b???n';
        }
        else if (empty($birth)) {
            $error = 'Vui l??ng nh???p ng??y sinh c???a b???n';
        }
        else if (empty($avatar)) {
            $error = 'Vui l??ng nh???p ch??n ???nh ?????i di???n';
        }
        else {
            $res = edit_Profile($id_convert,$avatar,$first,$last, $birth);
            if ($res['code'] == 0){
                $mes = "C???p nh???t th??ng tin th??nh c??ng!";
                echo "<script>alert('$mes');</script>";
                
            }
            else if($res['code'] == 1){
                $error = 'Id kh??ng t???n t???i';
            }else{
                $error = 'L???i ???? x???y ra, vui l??ng th??? l???i';
            }
        }
            
            
    }
}    
else{
    die('Id kh??ng h???p l???');
}
?>
<session>
<a class="edit_Profile mr-5" href="./seeProfile.php">Quay l???i</a>
<div class="box">
    <h2 class="text-center mt-4">C???p nh???t h??? s??</h2>
    <form method="post" action="" novalidate class="form-register text-light">
        <div class="form-row">
            <div class="inputB col-md-6">
                <input value="<?= $first?>" name="first" type="text" id="first" required=''>
                <label for="first">H???</label>
            </div>
            <div class="inputB col-md-6">
                <input value="<?= $last?>" name="last" type="text" id="last" required=''>
                <label for="last">T??n</label>
                <div class="invalid-tooltip">Last name is required</div>
            </div>
        </div>

        <div class="form-group">
            <label for="example-date-input" class="col-form-label">Ng??y sinh</label> 
            <input name="birth" class="form-control" type="date" value="<?= $birth?>" id="example-date-input">
        </div>
        <div class="form-group">
            <label class="form-label" for="customFile">Thay ???nh ?????i di???n</label>
            <input name="avatar" type="file" class="form-control" id="customFile" accept="image/gif, image/jpeg, image/png, image/bmp"/>
        </div>

        <div class="form-group">
            <?php
            if (!empty($error)) {
                echo "<div class='alert alert-danger requirements'>$error</div>";
            }
            ?>
            <button type="submit" class="btn btn-success px-5 mt-3 mr-2">C???p nh???t</button>
            <button type="reset" class="btn btn-danger px-5 mt-3">Reset</button>
        </div>
    </form>
</div>

</session>
<!--ket thuc phan chinh sua-->

<!-- Js Plugins -->
<script src="js/js/main.js"></script>


</body>

</html>
