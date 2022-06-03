<div class="container"> 
		<?php
		
		include 'class/Rating.php';
		$rating = new Rating();
		$itemDetails = $rating->getItem($_GET['id']);
		foreach($itemDetails as $apps){
			$average = $rating->getRatingAverage($apps["id"]);
			
		?>
		
		<?php } ?>	

		<?php	
		$itemRating = $rating->getItemRating($_GET['id']);	
		$ratingNumber = 0;
		$count = 0;
		$fiveStarRating = 0;
		$fourStarRating = 0;
		$threeStarRating = 0;
		$twoStarRating = 0;
		$oneStarRating = 0;	
		foreach($itemRating as $rate){
			$ratingNumber+= $rate['ratingNumber'];
			$count += 1;
			if($rate['ratingNumber'] == 5) {
				$fiveStarRating +=1;
			} else if($rate['ratingNumber'] == 4) {
				$fourStarRating +=1;
			} else if($rate['ratingNumber'] == 3) {
				$threeStarRating +=1;
			} else if($rate['ratingNumber'] == 2) {
				$twoStarRating +=1;
			} else if($rate['ratingNumber'] == 1) {
				$oneStarRating +=1;
			}
		}
		$average = 0;
		if($ratingNumber && $count) {
			$average = $ratingNumber/$count;
		}	
		?>		
		<br>		
		<div id="ratingDetails"> 		
			<div class="row">			
				<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
					<h3 style="color:white; margin-bottom:20px;">Nhận xét và đánh giá</h3>
					<h2 style="margin-bottom:20px; color: white;" class="bold padding-bottom-7" ><?php printf('%.1f', $average); ?> <small>/ 5</small></h2>				
					<?php
					$averageRating = round($average, 0);
					for ($i = 1; $i <= 5; $i++) {
						$ratingClass = "btn-default btn-grey";
						if($i <= $averageRating) {
							$ratingClass = "btn-warning";
						}
					?>
					<button type="button" class="btn btn-sm <?php echo $ratingClass; ?>" aria-label="Left Align">
						<span class="fa fa-star" aria-hidden="true"></span>
					</button>	
					<?php } ?>				
				</div>
				<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-2">
					<?php
					$fiveStarRatingPercent = round(($fiveStarRating/5)*100);
					$fiveStarRatingPercent = !empty($fiveStarRatingPercent)?$fiveStarRatingPercent.'%':'0%';	
					
					$fourStarRatingPercent = round(($fourStarRating/5)*100);
					$fourStarRatingPercent = !empty($fourStarRatingPercent)?$fourStarRatingPercent.'%':'0%';
					
					$threeStarRatingPercent = round(($threeStarRating/5)*100);
					$threeStarRatingPercent = !empty($threeStarRatingPercent)?$threeStarRatingPercent.'%':'0%';
					
					$twoStarRatingPercent = round(($twoStarRating/5)*100);
					$twoStarRatingPercent = !empty($twoStarRatingPercent)?$twoStarRatingPercent.'%':'0%';
					
					$oneStarRatingPercent = round(($oneStarRating/5)*100);
					$oneStarRatingPercent = !empty($oneStarRatingPercent)?$oneStarRatingPercent.'%':'0%';
					
					?>

					<!-- đánh giá sao -->
					<div class="pull-left">
						<div class="pull-left" style="width:35px; line-height:1;">
							<div style="height:9px; margin:5px 0; color:#FFC107;">5 <span class="fa fa-star"></span></div>
						</div>
						<div class="pull-left" style="width:180px;">
							<div class="progress" style="height:9px; margin:8px 0;">
								<div class="progress-bar progress-bar-success bg-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $fiveStarRatingPercent; ?>">
								<span class="sr-only"><?php echo $fiveStarRatingPercent; ?></span>
								</div>
							</div>
						</div>
                        <div class="pull-right" style="margin-left:10px;"><?php echo $fiveStarRating; ?></div>
					</div>
					
					<div class="pull-left">
						<div class="pull-left" style="width:35px; line-height:1;">
							<div style="height:9px; margin:5px 0; color:#FFC107;">4 <span class="fa fa-star"></span></div>
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
							<div style="height:9px; margin:5px 0; color:#FFC107;" >3 <span class="fa fa-star"></span></div>
						</div>
						<div class="pull-left" style="width:180px;">
							<div class="progress" style="height:9px; margin:8px 0;">
								<div class="progress-bar progress-bar-info bg-warning" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $threeStarRatingPercent; ?>">
                                    <span class="sr-only"><?php echo $threeStarRatingPercent; ?></span>
								</div>
							</div>
						</div>
                        <div class="pull-right" style="margin-left:10px;"><?php echo $threeStarRating; ?></div>
					</div>
					<div class="pull-left">
						<div class="pull-left" style="width:35px; line-height:1;">
							<div style="height:9px; margin:5px 0; color:#FFC107;">2 <span class="fa fa-star"></span></div>
						</div>
						<div class="pull-left" style="width:180px;">
							<div class="progress" style="height:9px; margin:8px 0;">
								<div class="progress-bar progress-bar-warning bg-danger" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $twoStarRatingPercent; ?>">
								<span class="sr-only"><?php echo $twoStarRatingPercent; ?></span>
								</div>
							</div>
						</div>
						<div class="pull-right" style="margin-left:10px;"><?php echo $twoStarRating; ?></div>
					</div>
					<div class="pull-left">
						<div class="pull-left" style="width:35px; line-height:1;">
							<div style="height:9px; margin:5px 0; color:#FFC107;">1 <span class="fa fa-star"></span></div>
						</div>
						<div class="pull-left" style="width:180px;">
							<div class="progress" style="height:9px; margin:8px 0;">
								<div class="progress-bar progress-bar-danger bg-danger" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $oneStarRatingPercent; ?>">
                                    <span class="sr-only"><?php echo $oneStarRatingPercent; ?></span>
								</div>
							</div>
						</div>
						<div class="pull-right" style="margin-left:10px;"><?php echo $oneStarRating; ?></div>
					</div>
					
				</div>
				<!-- kết thúc đánh giá sao -->
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3">
					<a class="btn btn-info"href="show_rating1.php?id=<?=$_GET['id']?>">
						Đánh giá ứng dụng
					</a>
				</div>		
			</div>
			<div class="row">
				<div class="col-sm-12">
					<hr/>
					<div class="review-block">		
					<?php
					$itemRating = $rating->getItemRating($_GET['id']);
					foreach($itemRating as $rating){				
						$date=date_create($rating['created']);
						$reviewDate = date_format($date,"M d, Y");							
					?>				
						<div class="row">
							<div class="col-sm-3">
								<img src="<?=$rating['avatar']?>" class="img-rounded user-pic rounded-circle">
								<div class="review-block-name"><a style="color: black; font-weight: bold;" href="#"><?=$rating['firstname']?> <?=$rating['lastname']?></a></div>
								<div class="review-block-date"><?php echo $reviewDate; ?></div>
							</div>
							<div class="col-sm-9">
								<div class="review-block-rate">
									<?php
									// set up màu sắc cho sao
									for ($i = 1; $i <= 5; $i++) {
										$ratingClass = "btn-default btn-grey";
										if($i <= $rating['ratingNumber']) {
											$ratingClass = "btn-warning";
										}
									?>
									<button type="button" class="btn btn-xs <?php echo $ratingClass; ?>" aria-label="Left Align">
										<span class="fa fa-star" aria-hidden="true"></span>
									</button>								
									<?php } ?>
								</div>
								<div class="review-block-title"><?php echo $rating['title']; ?></div>
								<div class="review-block-description"><?php echo $rating['comments']; ?></div>
							</div>
						</div>
						<hr/>	

					<?php 
					} 
					?>

					</div>
				</div>
			</div>	
		</div>
		<div id="ratingSection" style="display:none;">
			<div class="row">
				<div class="col-sm-12">
					<form id="ratingForm" method="POST">					
						<div class="form-group">
							<h4 style="color:white; margin-bottom:20px;">Đánh giá ứng dụng</h4>
							<button type="button" class="btn btn-warning btn-sm rateButton" aria-label="Left Align">
								<span class="fa fa-star" aria-hidden="true"></span>
							</button>
							<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
								<span class="fa fa-star" aria-hidden="true"></span>
							</button>
							<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
								<span class="fa fa-star" aria-hidden="true"></span>
							</button>
							<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
								<span class="fa fa-star" aria-hidden="true"></span>
							</button>
							<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
								<span class="fa fa-star" aria-hidden="true"></span>
							</button>
							<input type="hidden" class="form-control" id="rating" name="rating" value="1">
							<input type="hidden" class="form-control" id="itemId" name="itemId" value="<?php echo $_GET['id']; ?>">
							<input type="hidden" name="action" value="saveRating">
						</div>		

						<!-- comment -->
						<div class="form-group">
							<h6><label for="usr" style="color:white">Tiêu đề</label></h6>
							<input type="text" class="form-control" id="title" name="title" required>
						</div>
						<div class="form-group">
							<h6><label for="comment" style="color:white">Bình luận của bạn</label></h6>
							<textarea class="form-control" rows="5" id="comment" name="comment" required></textarea>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-info btn-lg" id="saveReview" style="margin-right:10px">Lưu</button>
							<button type="button" class="btn btn-info btn-lg" id="cancelReview">Hủy</button>
						</div>			
					</form>
				</div>
			</div>		
		</div>
	</div>