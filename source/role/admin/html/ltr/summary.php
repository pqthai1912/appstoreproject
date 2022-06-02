<?php
if (isset($_GET['id'])) {
    $sql = "SELECT * FROM account where phanquyen = 0";
    $res = $conn->query($sql);
    if ($res->num_rows > 0) {
        $row = $res->fetch_assoc();
        if ($_GET['id'] == 1) {
            $sql1 = "SELECT count(*) as 'tong' FROM account";
            $res1 = $conn->query($sql1);
            if ($res1->num_rows > 0) {
                $row1 = $res1->fetch_assoc();

?>
                <div class="card">
                    <div class="card-header">
                        Thống kê số lượng người dùng trên hệ thống:
                    </div>
                    <div class="card-body">

                        <table class="table-warning table-hover w-25">
                            <thead class="bg-dark text-light">
                                <tr>
                                    <th scope="col">Tổng số tài khoản</th>
                                </tr>
                            </thead>
                            <tbody>
                                <td><?= $row1['tong'] ?></td>
                            </tbody>
                        </table>
                        <blockquote class="blockquote mb-0 d-flex justify-content-end">
                            <footer class="blockquote-footer">Được thống kê bởi <?= $row['firstname'] ?> <?= $row['lastname'] ?></footer>
                        </blockquote>
                    </div>
                </div>


            <?php
            }
        } else if ($_GET['id'] == 2) {
            $sql1 = "SELECT count(*) as 'tong' FROM apps";
            $res1 = $conn->query($sql1);
            if ($res1->num_rows > 0) {
                $row1 = $res1->fetch_assoc();

            ?>
                <div class="card">
                    <div class="card-header">
                        Thống kê số lượng ứng dụng trên hệ thống:
                    </div>
                    <div class="card-body">

                        <table class="table-warning table-hover w-25">
                            <thead class="bg-dark text-light">
                                <tr>
                                    <th scope="col">Tổng số ứng dụng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <td><?= $row1['tong'] ?></td>
                            </tbody>
                        </table>
                        <blockquote class="blockquote mb-0 d-flex justify-content-end">
                            <footer class="blockquote-footer">Được thống kê bởi <?= $row['firstname'] ?> <?= $row['lastname'] ?></footer>
                        </blockquote>
                    </div>



                <?php
            }
        } else if ($_GET['id'] == 3) {
            $sql1 = "SELECT * FROM categories";
            $res1 = $conn->query($sql1);
            if ($res1->num_rows > 0) {

                ?>
                    <div class="card">
                        <div class="card-header">
                            Thống kê danh sách thể loại trên hệ thống:
                        </div>
                        <div class="card-body">

                            <table class="table-warning table-hover">
                                <thead class="bg-dark text-light">
                                    <tr>
                                        <th scope="col">Thể loại</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row1 = $res1->fetch_assoc()) : ?>
                                        <tr>
                                            <td><?php echo $row1['ten']; ?> </td>
                                        </tr>
                                    <?php endwhile;

                                    $sql2 = "SELECT count(*) as 'tong' FROM categories";
                                    $res2 = $conn->query($sql2);
                                    if ($res2->num_rows > 0) {
                                        $row2 = $res2->fetch_assoc();
                                    ?>

                                        <td class="d-flex justify-content-end"><?php echo "Tổng cộng: <b>" . $row2['tong'] . "</b> thể loại"; ?> </td>
                                    <?php
                                    } ?>
                                </tbody>
                            </table>
                            <blockquote class="blockquote mb-0 d-flex justify-content-end">
                                <footer class="blockquote-footer">Được thống kê bởi <?= $row['firstname'] ?> <?= $row['lastname'] ?></footer>
                            </blockquote>
                        </div>
                    </div>

                <?php
            }
        } else if ($_GET['id'] == 4) {
            $sql1 = "SELECT * FROM categories,apps where apps.theloai = categories.theloai group by categories.theloai";
            $res1 = $conn->query($sql1);
            if ($res1->num_rows > 0) {
                ?>
                    <div class="card">
                        <div class="card-header">
                            Thống kê số lượng ứng dụng mỗi thể loại trên hệ thống:
                        </div>
                        <div class="card-body">

                            <table class="table-warning table-hover">
                                <thead class="bg-dark text-light">
                                    <tr>
                                        <th scope="col">Tên thể loại</th>
                                        <th scope="col">Số lượng ứng dụng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row1 = $res1->fetch_assoc()) : ?>
                                        <tr>
                                            <td><?php echo $row1['ten']; ?> </td>

                                            <?php
                                            $sql2 = "SELECT count(*) as 'tong' FROM apps where theloai ='" . $row1['theloai'] . "'";
                                            $res2 = $conn->query($sql2);
                                            if ($res2->num_rows > 0) {
                                                $row2 = $res2->fetch_assoc();
                                            ?>

                                                <td><?php echo $row2['tong']; ?> </td>
                                            <?php
                                            } ?>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                            <blockquote class="blockquote mb-0 d-flex justify-content-end">
                                <footer class="blockquote-footer">Được thống kê bởi <?= $row['firstname'] ?> <?= $row['lastname'] ?></footer>
                            </blockquote>
                        </div>
                    </div>


                <?php
            }
        } else if ($_GET['id'] == 5) {
            $sql1 = "SELECT * FROM apps,categories WHERE apps.theloai = categories.theloai ORDER BY apps.luottai DESC limit 0,6";
            $res1 = $conn->query($sql1);
            if ($res1->num_rows > 0) {


                ?>
                    <div class="card">
                        <div class="card-header">
                            Thống kê danh sách tải-mua nhiều nhất trên hệ thống:
                        </div>
                        <div class="card-body">

                            <table class="table-warning table-hover">
                                <thead class="bg-dark text-light">
                                    <tr>
                                        <th scope="col">Tên ứng dụng</th>
                                        <th scope="col">Số lượt tải-mua</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row1 = $res1->fetch_assoc()) : ?>
                                        <tr>
                                            <td><?php echo $row1['tenapp']; ?> </td>
                                            <td><?php echo $row1['luottai']; ?> </td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                            <blockquote class="blockquote mb-0 d-flex justify-content-end">
                                <footer class="blockquote-footer">Được thống kê bởi <?= $row['firstname'] ?> <?= $row['lastname'] ?></footer>
                            </blockquote>
                        </div>
                    </div>


    <?php
            }
        }
    }
}
