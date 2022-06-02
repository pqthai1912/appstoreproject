<?php
require_once('db.php');

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
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

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
        <?php require_once("header.php") ?>
    </header>
    <!-- Header End -->

    <session>
    <a class="edit_Profile mr-5" href="index.php">Quay lại</a>
        <div class="container">
            <div class="row">
                <div class="col-lg-2 text-light mt-3">

                </div>

            </div>

            <div class="col-lg-10 mt-4">
                <table class="table table-striped table-dark justify-content-lg-center">
                    <thead>
                        <tr class="bg-danger">
                            <th scope="col">id</th>
                            <th scope="col">Mã giao dịch</th>
                            <th scope="col">Mệnh giá</th>
                            <th scope="col">Ngày nạp</th>
                        </tr>
                    </thead>
                    <tbody>
    <?php
        if(isset($_GET["id"])){
            $id_convert=$_GET["id"];
            settype($id_convert,"int");
            $sql = "select username from account where id = '".$id_convert."'";
            $res = $conn->query($sql);

            if($res->num_rows>0) {
                $row =$res->fetch_assoc();
                $sql1 = "SELECT * FROM transaction_history where username = '".$row['username']."'";
                $res1 = $conn->query($sql1);
                if($res1->num_rows>0){
                    while ($row1 =$res1->fetch_assoc()){
                        $date = date("d-m-Y", strtotime($row1['lichsunap']));
                    ?>
                        <tr>
                            <th scope="row"><?=$row1['id']?></th>
                            <td><?=$row1['magiaodich']?></td>
                            <td><?=$row1['menhgia']?></td>
                            <td><?=$date?></td>
                        </tr>
                    <?php
                    }
                }
            }
        }
    ?>
            
                    </tbody>
                </table>
            </div>



        </div>

    </session>
    <!--ket thuc phan nạp-->

    <!-- Js Plugins -->
    <script src="js/js/main.js"></script>


</body>

</html>