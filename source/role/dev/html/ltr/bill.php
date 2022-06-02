<?php
include '../../../../connect.php';
$digits = 10;
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
                <h4 class="page-title">Danh sách đơn hàng ứng dụng tính phí</h4>

            </div>

        </div>
    </div>

    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="container">
                    </div>
                    <div class="row">
                        <div class="col">
                            <table class="table table-hover table-striped table-bordered text-center" >
                                <thead>
                                <tr>
                                    <th>Icon</th>
                                    <th>Tên ứng dụng</th>
                                    <th>Chi phí</th>
                                    <th>Thời gian mua</th>
                                    <th>Lợi nhuận</th>
                                </tr>
                                </thead>
                                <tbody>

                                    <tr class="item">
                                        <td style="display: none;" class="product_id" class=" align-middle">1</td>
                                        <td  class=" align-middle"><img src="../../../../img/games/genshin.png"></td>
                                        <td  class=" align-middle">Genshin Impact</td>
                                        <td class=" align-middle">15000 VNĐ</td>
                                        <td class=" align-middle"><?= date("d-m-Y") ?></td>
                                        <td class=" align-middle"><?= rand(pow(10, $digits-1), pow(10, $digits)-1) ?> VNĐ</td>
                                    </tr>

                                    <tr class="item">
                                        <td style="display: none;" class="product_id" class=" align-middle">1</td>
                                        <td  class=" align-middle"><img src="../../../../img/games/snake.png"></td>
                                        <td  class=" align-middle">Snake Worm Zone</td>
                                        <td class=" align-middle">10000 VNĐ</td>
                                        <td class=" align-middle"><?= date("d-m-Y") ?></td>
                                        <td class=" align-middle"><?= rand(pow(10, $digits-1), pow(10, $digits)-1) ?> VNĐ</td>

                                    </tr>

                                    <tr class="item">
                                        <td style="display: none;" class="product_id" class=" align-middle">1</td>
                                        <td  class=" align-middle"><img src="../../../../img/games/templerun.png"></td>
                                        <td  class=" align-middle">Temple Run 2</td>
                                        <td class=" align-middle">30000 VNĐ</td>
                                        <td class=" align-middle"><?= date("d-m-Y") ?></td>
                                        <td class=" align-middle"><?= rand(pow(10, $digits-1), pow(10, $digits)-1) ?> VNĐ</td>

                                    </tr>

                                </tbody>

                            </table>
                        </div>
                    </div>
                    <div class="text-right">
                        Có <span class="badge badge-danger badge-pill">3</span> ứng dụng đã bán.
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