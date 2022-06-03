<?php
session_start();

require_once ('../../../../connect.php');

$update = false;
$mathe = '';
$series= '';
$menhgia = '';
$trangthai = '';

if (isset($_POST['trangthai']) && isset($_POST['menhgia'])){
    $trangthai = $_POST['trangthai'];
    $menhgia = $_POST['menhgia'];

    if (empty($menhgia)) {
        $_SESSION['message'] = "Vui lòng chọn mệnh giá!";
        $_SESSION['msg_type'] = "danger";

        header('location: trangqlmathe.php');
    }
    else if (empty($trangthai)) {
        $_SESSION['message'] = "Vui lòng chọn trạng thái!";
        $_SESSION['msg_type'] = "danger";

        header('location: trangqlmathe.php');
    }
    else {

    }

}

if(isset($_POST['save'])){
    $digits = 12;
	$mathe = rand(pow(10, $digits-1), pow(10, $digits)-1);
    $series= rand(pow(10, $digits-1), pow(10, $digits)-1);
    $menhgia = $_POST['menhgia'];
    $trangthai =$_POST['trangthai'];


	$mysqli->query("INSERT INTO recharge_card (menhgia, mathe,series,trangthai) VALUES(".$menhgia.",'".$mathe."','".$series."',".$trangthai.")") or die($mysqli->error);

	$_SESSION['message'] = "Thêm thẻ nạp thành công!";
	$_SESSION['msg_type'] = "success";

	header('location: trangqlmathe.php');
}

if(isset($_GET['delete'])){
	$mysqli->query("DELETE FROM recharge_card WHERE mathe = '".$_GET['delete']."'") or die($mysqli->error());
	
	$_SESSION['message'] = "Xóa thẻ nạp thành công!";
	$_SESSION['msg_type'] = "success";

    header('location: trangqlmathe.php');
}

if(isset($_GET['edit'])){
    $mathe = $_GET['edit'];
	$update = true;
	$result = $mysqli->query("SELECT * FROM recharge_card WHERE mathe = '".$mathe."'") or die($mysqli->error());
	if($result->num_rows > 0){
		$row = $result->fetch_array();
		$mathe = $row['mathe'];
        $series = $row['series'];
        $menhgia = $row['menhgia'];
        $trangthai = $row['trangthai'];
	}
}

if(isset($_POST['update'])){
//	$id = $_POST['id'];
    $mathe = $_GET['mathe'];
    $series = $_POST['series'];
    $menhgia = $_POST['menhgia'];
    $trangthai = $_POST['trangthai'];
	$mysqli->query("UPDATE recharge_card SET menhgia=".$menhgia.", trangthai =".$trangthai." where mathe = '".$mathe."'") or die($mysqli->error);

	$_SESSION['message'] = "Cập nhật thẻ nạp thành công!";
	$_SESSION['msg_type'] = "success";

    header('location: trangqlmathe.php');
}

