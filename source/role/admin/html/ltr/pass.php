<div class="row">
    <div class="row">
        <!-- column -->
        <div class="col-sm-3 col-lg-2"></div>
        <div class="col-sm-8 col-lg-8">
            <?php
            if (!empty($mes)) {
                echo "<div class='alert alert-success'>$mes</div>";
            }
            ?>
            <div class="card">
                <div class="card-body"><br>
                    <!-- title -->
                    <div class="d-md-flex">
                        <div>
                            <h4 class="card-title">Danh sách ứng dụng</h4>

                        </div>

                    </div></br>

                    <div class="row">
                        <?php
                        require_once('../../../../connect.php');
                        $result = $mysqli->query ("SELECT * FROM product where active = 'Đang chờ duyệt' ") or die($mysqli->error);
                        if($result->num_rows>0){
                        ?>
                        <div class="col-md-4 col-lg-4">
                            <div class="list-group" id="list-tab" role="tablist">
                                <a class="list-group-item list-group-item-action active pb-3 pt-3 " id="list-ds-list" data-toggle="list" href="#list-ds" role="tab" aria-controls="ds">
                                    <b>Đang chờ duyệt</b>
                                </a>
                                <?php
                                while($row = $result->fetch_array()){
                                    ?>
                                    <a class="list-group-item list-group-item-action" id="list-<?=$row['id']?>-list" data-toggle="list" href="#list-<?=$row['id']?>" role="tab" aria-controls="<?=$row['id']?>">
                                        <img src="../../../../<?=$row['image']?>" class="w-25 mr-2" alt="..."> <?=$row['name']?>
                                    </a>
                                    <?php
                                }

                                ?>
                            </div>
                        </div>

                        <div class="col-md-8 col-lg-8" >
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="list-ds" role="tabpanel" aria-labelledby="list-ds-list"></div>
                                <?php
                                //                                            truy van lại để lấy song song vs id tren
                                $result2 = $mysqli->query ("SELECT * FROM product where active = 'Đang chờ duyệt' ") or die($mysqli->error);
                                if($result2->num_rows>0){
                                    while($row1 = $result2->fetch_array()) {
                                        ?>
                                        <div class="tab-pane fade show" id="list-<?=$row1['id']?>" role="tabpanel" aria-labelledby="list-<?=$row1['id']?>-list">
                                            <div class="card-header mb-3" style="width: 20rem;">
                                                <div class="card-body">
                                                    <h5 class="font-weight-bold mb-3 d-flex justify-content-center text-info"><b>Thông tin chi tiết</b></h5>
                                                    <h6 class="mb-0 d-flex justify-content-center"><b><?=$row1['name']?></b></h6>
                                                </div>
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item">Người gửi: <?=$row1['nhaphattrien']?></li>
                                                    <li class="list-group-item">Thể loại: <?=$row1['theloai']?></li>
                                                    <li class="list-group-item">Kiểu: <?=$row1['type']?></li>
                                                    <li class="list-group-item">Phí: <?php
                                                        if($row1['price'] == 0){
                                                            echo "Miễn phí";
                                                        }else{
                                                            echo $row1['price']. " VNĐ";
                                                        }
                                                        ?>
                                                    <li class="list-group-item">Ngày gửi: <?php
                                                        $date = date("d-m-Y", strtotime($row1['tggui']));
                                                        echo $date;
                                                        ?>
                                                    </li>
                                                    </li>
                                                    <li class="list-group-item">Mô tả:<br> <?=$row1['description']?></li>
                                                </ul>
                                                <div class="card-body">
                                                    <a href="./duyetungdung.php?deny=<?=$row1['id']?>" class="card-link">Không đồng ý</a>
                                                    <a href="./duyetungdung.php?pass=<?=$row1['id']?>" class="card-link">Đồng ý</a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                                }
                                ?>
                            </div >
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Table -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Recent comment and chats -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- Recent comment and chats -->
    <!-- ============================================================== -->
</div>

