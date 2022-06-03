<?php
session_start();
?>
<!DOCTYPE html>
<html lang='en'>

<head>
	<title>DTH store</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
	<script src="js/rating.js"></script>
	<link rel="stylesheet" href="css/css/style.css" type="text/css">
	<link rel="stylesheet" href="css/style.css" type="text/css">
	
	<!-- logo -->
	<link rel="icon" href="img/DTH.png" type="image/x- icon">
</head>

<body>
	<?php
		if (!isset($_SESSION['user'])) {
			$print = '<div><h1 style="color:white; text-align: center;">
					<b>Vui lòng
					<a href="login.php" class="text-danger">Đăng nhập</a> trước</b>
				  </h1></div>';
			die($print);
		}
	?>
	<div class="container" style="min-height:500px;">

		<div class="container">
			<?php
			include 'class/Rating.php';
			$rating = new Rating();
			$itemDetails = $rating->getItem($_GET['id']);
			foreach ($itemDetails as $item) {
				$average = $rating->getRatingAverage($item["id"]);
			} ?>


			<?php
			$itemRating = $rating->getItemRating($_GET['id']);
			$ratingNumber = 0;
			$count = 0;
			$fiveStarRating = 0;
			$fourStarRating = 0;
			$threeStarRating = 0;
			$twoStarRating = 0;
			$oneStarRating = 0;
			foreach ($itemRating as $rate) {
				$ratingNumber += $rate['ratingNumber'];
				$count += 1;
				if ($rate['ratingNumber'] == 5) {
					$fiveStarRating += 1;
				} else if ($rate['ratingNumber'] == 4) {
					$fourStarRating += 1;
				} else if ($rate['ratingNumber'] == 3) {
					$threeStarRating += 1;
				} else if ($rate['ratingNumber'] == 2) {
					$twoStarRating += 1;
				} else if ($rate['ratingNumber'] == 1) {
					$oneStarRating += 1;
				}
			}
			$average = 0;
			if ($ratingNumber && $count) {
				$average = $ratingNumber / $count;
			}
			?>
			<br>
			<div id="ratingDetails">
				<div class="row">
					<div class="col-sm-4">
						<h4>Nhận xét và đánh giá</h4>
						<h2 class="bold padding-bottom-7"><?php printf('%.1f', $average); ?> <small>/ 5</small></h2>
						<?php
						$averageRating = round($average, 0);
						for ($i = 1; $i <= 5; $i++) {
							$ratingClass = "btn-default btn-grey";
							if ($i <= $averageRating) {
								$ratingClass = "btn-warning";
							}
						?>
							<button type="button" class="btn btn-sm <?php echo $ratingClass; ?>" aria-label="Left Align">
								<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
							</button>
						<?php } ?>
					</div>
					<div class="col-sm-4">
						<?php
						$fiveStarRatingPercent = round(($fiveStarRating / 5) * 100);
						$fiveStarRatingPercent = !empty($fiveStarRatingPercent) ? $fiveStarRatingPercent . '%' : '0%';

						$fourStarRatingPercent = round(($fourStarRating / 5) * 100);
						$fourStarRatingPercent = !empty($fourStarRatingPercent) ? $fourStarRatingPercent . '%' : '0%';

						$threeStarRatingPercent = round(($threeStarRating / 5) * 100);
						$threeStarRatingPercent = !empty($threeStarRatingPercent) ? $threeStarRatingPercent . '%' : '0%';

						$twoStarRatingPercent = round(($twoStarRating / 5) * 100);
						$twoStarRatingPercent = !empty($twoStarRatingPercent) ? $twoStarRatingPercent . '%' : '0%';

						$oneStarRatingPercent = round(($oneStarRating / 5) * 100);
						$oneStarRatingPercent = !empty($oneStarRatingPercent) ? $oneStarRatingPercent . '%' : '0%';

						?>
						<div class="pull-left">
							<div class="pull-left" style="width:35px; line-height:1;">
								<div style="height:9px; margin:5px 0;">5 <span class="glyphicon glyphicon-star"></span></div>
							</div>
							<div class="pull-left" style="width:180px;">
								<div class="progress" style="height:9px; margin:8px 0;">
									<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $fiveStarRatingPercent; ?>">
										<span class="sr-only"><?php echo $fiveStarRatingPercent; ?></span>
									</div>
								</div>
							</div>
							<div class="pull-right" style="margin-left:10px;"><?php echo $fiveStarRating; ?></div>
						</div>

						<div class="pull-left">
							<div class="pull-left" style="width:35px; line-height:1;">
								<div style="height:9px; margin:5px 0;">4 <span class="glyphicon glyphicon-star"></span></div>
							</div>
							<div class="pull-left" style="width:180px;">
								<div class="progress" style="height:9px; margin:8px 0;">
									<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $fourStarRatingPercent; ?>">
										<span class="sr-only"><?php echo $fourStarRatingPercent; ?></span>
									</div>
								</div>
							</div>
							<div class="pull-right" style="margin-left:10px;"><?php echo $fourStarRating; ?></div>
						</div>
						<div class="pull-left">
							<div class="pull-left" style="width:35px; line-height:1;">
								<div style="height:9px; margin:5px 0;">3 <span class="glyphicon glyphicon-star"></span></div>
							</div>
							<div class="pull-left" style="width:180px;">
								<div class="progress" style="height:9px; margin:8px 0;">
									<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $threeStarRatingPercent; ?>">
										<span class="sr-only"><?php echo $threeStarRatingPercent; ?></span>
									</div>
								</div>
							</div>
							<div class="pull-right" style="margin-left:10px;"><?php echo $threeStarRating; ?></div>
						</div>
						<div class="pull-left">
							<div class="pull-left" style="width:35px; line-height:1;">
								<div style="height:9px; margin:5px 0;">2 <span class="glyphicon glyphicon-star"></span></div>
							</div>
							<div class="pull-left" style="width:180px;">
								<div class="progress" style="height:9px; margin:8px 0;">
									<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $twoStarRatingPercent; ?>">
										<span class="sr-only"><?php echo $twoStarRatingPercent; ?></span>
									</div>
								</div>
							</div>
							<div class="pull-right" style="margin-left:10px;"><?php echo $twoStarRating; ?></div>
						</div>
						<div class="pull-left">
							<div class="pull-left" style="width:35px; line-height:1;">
								<div style="height:9px; margin:5px 0;">1 <span class="glyphicon glyphicon-star"></span></div>
							</div>
							<div class="pull-left" style="width:180px;">
								<div class="progress" style="height:9px; margin:8px 0;">
									<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $oneStarRatingPercent; ?>">
										<span class="sr-only"><?php echo $oneStarRatingPercent; ?></span>
									</div>
								</div>
							</div>
							<div class="pull-right" style="margin-left:10px;"><?php echo $oneStarRating; ?></div>
						</div>
					</div>
					<div class="col-sm-4">
						<button type="button" id="rateProduct" class="btn btn-info <?php if (!empty($_SESSION['user']) && $_SESSION['user']) {
																						echo 'login';
																					} ?>">Viết nhận xét</button> <br>
						<a type="button" class="btn btn-success" href="./appPage.php?id=<?=$_GET['id']?>">Xem đánh giá</a>
					</div>
				</div>
				<div class="row">
				</div>
			</div>
			<div id="ratingSection" style="display:none;">
				<div class="row">
					<div class="col-sm-12">
						<form id="ratingForm" method="POST">
							<div class="form-group">
								<h4>Đánh giá ứng dụng</h4>
								<button type="button" class="btn btn-warning btn-sm rateButton" aria-label="Left Align">
									<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
								</button>
								<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
									<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
								</button>
								<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
									<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
								</button>
								<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
									<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
								</button>
								<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
									<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
								</button>
								<input type="hidden" class="form-control" id="rating" name="rating" value="1">
								<input type="hidden" class="form-control" id="itemId" name="itemId" value="<?php echo $_GET['id']; ?>">
								<input type="hidden" name="action" value="saveRating">
							</div>
							<div class="form-group">
								<label class="color_text" for="usr">Tiêu đề đánh giá</label>
								<input type="text" class="form-control" id="title" name="title" required>
							</div>
							<div class="form-group">
								<label class="color_text" for="comment">Bình luận*</label>
								<textarea class="form-control" rows="5" id="comment" name="comment" required></textarea>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-info" id="saveReview">Đăng nhận xét</button> <button type="button" class="btn btn-info" id="cancelReview">Hủy</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="loginmodal-container">
						<h1>Vì tính chất bảo mật</h1>
						<h1>Đăng nhập lần nữa để đánh giá ứng dụng này</h1><br>
						<div style="display:none;" id="loginError" class="alert alert-danger">Tài khoản/Mật khẩu không hợp lệ</div>
						<form method="post" id="loginForm" name="loginForm">
							<input type="text" name="user" placeholder="Username" required>
							<input type="password" name="pass" placeholder="Password" required>
							<input type="hidden" name="action" value="userLogin">
							<input type="submit" name="login" class="login loginmodal-submit" value="Login">
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="insert-post-ads1" style="margin-top:20px;">

		</div>
	</div>
</body>

</html>