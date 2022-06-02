<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Xtreme lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Xtreme admin lite design, Xtreme admin lite dashboard bootstrap 5 dashboard template">
    <meta name="robots" content="noindex,nofollow">
    <link rel="canonical" href="https://www.wrappixel.com/templates/xtreme-admin-lite/" />
    <link href="../../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="../../dist/css/style.min.css" rel="stylesheet">
    <title>DTH store</title>
	
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
                        <h4 class="page-title">Dashboard</h4>
                        
                    </div>
                    
                </div>
            </div>
        <div class="container-fluid">
            <div class="row">        
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-md-flex">
                                    <div>
                                        <h4 class="card-title">Ứng dụng của tôi</h4>
                                        <h5 class="card-subtitle">Tổng quan</h5>
                                    </div>
                                    <div class="ms-auto">
                                        <div class="dl">
                                            <select class="form-select shadow-none">
                                                
                                                <option value="1">Tên</option>
                                                <option value="2" selected>Thể loại</option>
                                                <option value="3">Lợi nhuận</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table v-middle">
                                    <thead>
                                        <tr class="bg-light">
                                            <th class="border-top-0">Tên ứng dụng</th>
                                            <th class="border-top-0">Thể loại</th>
                                            <th class="border-top-0">Tình trạng</th>
                                            <th class="border-top-0">Công nghệ</th>
                                            <th class="border-top-0">Số lượt tải</th>
                                            
                                            <th class="border-top-0">Lợi nhuận</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="m-r-10"><a
                                                            class="btn btn-circle d-flex btn-success text-white">Om</a>
                                                    </div>
                                                    <div class="">
                                                        <h4 class="m-b-0 font-16">Onmyoji</h4>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Game</td>
                                            <td>Đã được duyệt</td>
                                            <td>
                                                <label class="label label-success">Al</label>
                                            </td>
                                            
                                            <td>19k</td>
                                            <td>
                                                <h5 class="m-b-0">28509808 VND</h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="m-r-10"><a
                                                            class="btn btn-circle d-flex btn-purple text-white">GI</a>
                                                    </div>
                                                    <div class="">
                                                        <h4 class="m-b-0 font-16">Genshin Impact</h4>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Game</td>
                                            <td>Bản nháp</td>
                                            <td>
                                                <label class="label label-purple">Ruby</label>
                                            </td>
                                            
                                            <td>1412</td>
                                            <td>
                                                <h5 class="m-b-0">2850906 VND</h5>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Ghi chú</h4>
                            </div>
                            <div class="comment-widgets scrollable">
                                <div class="d-flex flex-row comment-row m-t-0">
                                    <div class="p-2"><img src="../../assets/images/users/1.jpg" alt="user" width="50"
                                            class="rounded-circle"></div>
                                    <div class="comment-text w-100">
                                        <h6 class="font-medium">Project</h6>
                                        <span class="m-b-15 d-block">Tải game mới </span>
                                        <div class="comment-footer">
                                            <span class="text-muted float-end">May 15, 2021</span> <span
                                                class="label label-rounded label-primary">Đang thực thi</span> <span
                                                class="action-icons">
                                                
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Dự báo thời tiết</h4>
                                <div class="d-flex align-items-center flex-row m-t-30">
                                    <div class="display-5 text-info"><i class="wi wi-day-showers"></i>
                                        <span>31<sup>°</sup></span></div>
                                    <div class="m-l-10">
                                        <h3 class="m-b-0">Saturday</h3><small>Nguyễn Hữu Thọ, Quận 7</small>
                                    </div>
                                </div>
                                <table class="table no-border mini-table m-t-20">
                                    <tbody>
                                        <tr>
                                            <td class="text-muted">Wind</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Humidity</td>
                                            <td class="font-medium">73%</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Pressure</td>
                                            <td class="font-medium">28.56 in</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Cloud Cover</td>
                                            <td class="font-medium">78%</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <ul class="row list-style-none text-center m-t-30">
                                    <li class="col-3">
                                        <h4 class="text-info"><i class="wi wi-day-sunny"></i></h4>
                                        <span class="d-block text-muted">09:30</span>
                                        <h3 class="m-t-5">80<sup>°</sup></h3>
                                    </li>
                                    <li class="col-3">
                                        <h4 class="text-info"><i class="wi wi-day-cloudy"></i></h4>
                                        <span class="d-block text-muted">11:30</span>
                                        <h3 class="m-t-5">75<sup>°</sup></h3>
                                    </li>
                                    <li class="col-3">
                                        <h4 class="text-info"><i class="wi wi-day-hail"></i></h4>
                                        <span class="d-block text-muted">13:30</span>
                                        <h3 class="m-t-5">78<sup>°</sup></h3>
                                    </li>
                                    <li class="col-3">
                                        <h4 class="text-info"><i class="wi wi-day-sprinkle"></i></h4>
                                        <span class="d-block text-muted">15:30</span>
                                        <h3 class="m-t-5">83<sup>°</sup></h3>
                                    </li>
                                </ul>
                            </div>
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
    <script src="../../assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="../../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="../../dist/js/pages/dashboards/dashboard1.js"></script>
</body>

</html>