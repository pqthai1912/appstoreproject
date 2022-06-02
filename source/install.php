<?php
//login first
require_once('db.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Trang thanh toán</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/css/reset_pass.css">
</head>

<body>
    <?php
    $conn = open_database();
    if (!isset($_SESSION['user'])) {
        $print = '<h1 class="text-light d-flex justify-content-center mt-5 mt-5">
                <b>Vui lòng
                <a href="login.php" class="text-danger">Đăng nhập</a> trước</b>
              </h1>';
        die($print);
    }
    if (isset($_GET['file'])) {
        $file = $_GET['file'];
        $path = "apk/" . $file;

        //    kiem tra file ton tai chua
        if (file_exists($path)) {
            $sql="SELECT id FROM apps WHERE link = '".$_GET['file']."'";
            $res = $conn->query($sql);
            if($res->num_rows>0) {
                $row = $res->fetch_assoc();

                $sql1 = "SELECT tenapp FROM down_apps WHERE username = '" . $_SESSION['user'] . "' and maapp = '" . $row['id'] . "'";
                $res1 = $conn->query($sql1);
                // nếu đã cài đặt rồi thì không cần phải thanh toán lại
                if($res1->num_rows>0){
                    //Đã cài đặt rồi
					check_listMyApp($_SESSION['user'],$_GET['file']);
                    header('Content-Description: File Transfer');
                    header('Content-Type: application/octet-stream');
                    header('Content-Disposition: attachment;  filename="'. $file .'"');
                    header('Content-Transfer-Encoding: binary');
                    header('Expires: 0');
                    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                    header('Pragma: public');
                    header('Content-Length: ' . filesize($path));
                    ob_clean();
                    ob_end_flush();
                    $handle = fopen($path, "rb");
                    while (!feof($handle)) {
                        echo fread($handle, 1000);
                    }
                    exit;
                }
                else{
                    //thực hiện việc thanh toán
                    $sodu = get_Sodu($_SESSION['user'], $_GET['file']);
                    if ($sodu['code'] == '0') {
                        //check thêm vào danh sách, còn việc khách tải nhiều lần không quan tâm
                        check_listMyApp($_SESSION['user'],$_GET['file']);
                        header('Content-Description: File Transfer');
                        header('Content-Type: application/octet-stream');
                        header('Content-Disposition: attachment;  filename="'. $file .'"');
                        header('Content-Transfer-Encoding: binary');
                        header('Expires: 0');
                        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                        header('Pragma: public');
                        header('Content-Length: ' . filesize($path));
                        ob_clean();
                        ob_end_flush();
                        $handle = fopen($path, "rb");
                        while (!feof($handle)) {
                            echo fread($handle, 1000);
                        }
                        exit;


                    } else if ($sodu['code'] == '2') {
                        $print = '<h1 class="text-light d-flex justify-content-center mt-5 mt-5">
                                Không đủ tiền để thanh toán.<b> Trở về <a href="index.php" class="text-danger"> trang chủ </a> tại đây.</b>
                                  </h1>';
                        die($print);
                    } else {
                        $print = '<h1 class="text-light d-flex justify-content-center mt-5 mt-5">
                                Vui lòng thử lại sau.
                                  </h1>';
                        die($print);
                    }
                }

            }else{
                $print = '<h1 class="text-light d-flex justify-content-center mt-5 mt-5">
                            Vui lòng bổ sung tên tập tin trên URL
                      </h1>';
                die($print);
            }
        } else {
            $print = '<h1 class="text-light d-flex justify-content-center mt-5 mt-5">
                Tập tin không tồn tại
                  </h1>';
            die($print);
        }
    }

    $print = '<h1 class="text-light d-flex justify-content-center mt-5 mt-5">
                Vui lòng bổ sung tên tập tin trên URL
          </h1>';
    die($print);
    ?>
</body>

</html>