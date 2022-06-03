<?php
    require_once("db.php");
    $conn = open_database();
?>

<div class="container">
    <div class="header__nav mt-3">
        <nav class="header__menu mb-3">
            <ul>
                <li><a href="index.php">Trang chủ</a></li>
                <li><a href="#">Thể loại cụ thể <span class="arrow_carrot-down"></span></a>
                    <ul class="dropdown">
                <!--hien thi danh sach-->
                <?php
                    $sql = "SELECT * FROM categories WHERE game = 1 and app = 0";
                    $res = $conn->query($sql);
                    if($res->num_rows>0){
                        while ($row = $res->fetch_assoc()){
                            ?>
                            <li><a href="/games.php?theloai=<?=$row['theloai']?>"><?= $row["ten"]?></a></li>
                    <?php
                        }
                    }
                ?>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>