<?php
session_start();

require_once ('../../../../connect.php');

$update = false;
$theloai = '';
$ten = '';
$kieu = '';

if(isset($_POST['save'])){
    $digits = 8;
    $theloai = rand(pow(10, $digits-1), pow(10, $digits)-1); //tạo ngẫu nhiên 8 số làm để làm khóa chính
    $kieu = $_POST['kieu'];
    $ten =$_POST['ten'];

    $result = $mysqli->query("SELECT * FROM categories WHERE ten = '".$ten."'") or die($mysqli->error());

    if (empty($ten)) {
        $_SESSION['message'] = "Vui lòng chọn tên thể loại!";
        $_SESSION['msg_type'] = "danger";

        header('location: trangqltheloai.php');
    }
    else if ($result->num_rows > 0) {
        $_SESSION['message'] = "Tên thể loại đã bị trùng!";
        $_SESSION['msg_type'] = "danger";

        header('location: trangqltheloai.php');
    }
    else {
        if($kieu == 0){
            $mysqli->query("INSERT INTO categories (theloai,ten,app,game) VALUES('".$theloai."','".$ten."',1,0)") or die($mysqli->error);

            $_SESSION['message'] = "Thêm thể loại thành công!";
            $_SESSION['msg_type'] = "success";

            header('location: trangqltheloai.php');
        }else if($kieu == 1){
            $mysqli->query("INSERT INTO categories (theloai,ten,app,game) VALUES('".$theloai."','".$ten."',0,1)") or die($mysqli->error);

            $_SESSION['message'] = "Thêm thể loại thành công!";
            $_SESSION['msg_type'] = "success";

            header('location: trangqltheloai.php');
        }else {
            $_SESSION['message'] = "Vui lòng chọn kiểu!";
            $_SESSION['msg_type'] = "danger";

            header('location: trangqltheloai.php');
        }
    }

}

if(isset($_GET['delete'])){
    $mysqli->query("DELETE FROM categories WHERE theloai = '".$_GET['delete']."'") or die($mysqli->error());

    $_SESSION['message'] = "Xóa thể loại thành công!";
    $_SESSION['msg_type'] = "success";

    header('location: trangqltheloai.php');
}

if(isset($_GET['edit'])){
    $theloai = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM categories WHERE theloai = '".$theloai."'") or die($mysqli->error());
    if($result->num_rows > 0){
        $row = $result->fetch_array();
        $theloai = $row['theloai'];
        $ten = $row['ten'];
        if ($row['app'] == 1 || $row['game'] == 0){
            $kieu = 0;
        }else{
            $kieu = 1;
        }
        
        
    }
}

if(isset($_POST['update'])){
    $theloai = $_GET['theloai'];
    $ten = $_POST['ten'];
    $kieu = $_POST['kieu'];

    $result = $mysqli->query("SELECT * FROM categories WHERE ten = '".$ten."'") or die($mysqli->error());

    if (empty($ten)) {
        $_SESSION['message'] = "Vui lòng chọn tên thể loại!";
        $_SESSION['msg_type'] = "danger";

        header('location: trangqltheloai.php');
    }
    else if ($result->num_rows > 0) {
        $_SESSION['message'] = "Tên thể loại đã bị trùng!";
        $_SESSION['msg_type'] = "danger";

        header('location: trangqltheloai.php');
    }

    else {
        if ($kieu == 0) {
            $mysqli->query("UPDATE categories SET ten ='" . $ten . "', app = 1, game = 0 where theloai = '" . $theloai . "'") or die($mysqli->error);
        } else {
            $mysqli->query("UPDATE categories SET ten ='" . $ten . "', app = 0, game = 1 where theloai = '" . $theloai . "'") or die($mysqli->error);
        }

        $_SESSION['message'] = "Cập nhật thể loại thành công!";
        $_SESSION['msg_type'] = "success";

        header('location: trangqltheloai.php');
    }
}

