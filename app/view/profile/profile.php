<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel= "styleSheet" href="styleSheet.css">
    <title>Profile Page</title>
</head>
<body>
	<div class="container-fluid profilePage">
		<div class="container">
			<div class="row align-items-center justify-content-center profileHeader">
				<div class="col-4 profile-img">
					<?php printImage($userImage) ?>
				</div>
				<div class="col-7 profile-info">
					<div class="row userName">
						<h1 class="col-8"><?php echo $userDisplayName ?></h1>
						<div class="col-3">
							<a class="btn editButton" href="?page=profile/edit_profile">Edit Profile</a>
						</div>
					</div>
					<div class="row justify-content-between profStats">
						<h5 class="col-6"><?php echo $userCity . ", " . $userState; ?></h5>
						<h5 class="col-5">Birthday: <?php echo $birthday; ?></h5>
					</div>
					<div class="row bioRow">
						<p class="col p-2"><?php echo $userBio; ?></p>
					</div>
				</div>
			</div>
		</div>
		<div class="container pageContent">
			<div>
				<ul class="nav nav-tabs nav-fill" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="fitines-tab" data-toggle="tab" href="#fitines" role="tab">Fitines</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="followers-tab" data-toggle="tab" href="#followers" role="tab">Followers</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="following-tab" data-toggle="tab" href="#following" role="tab">Following</a>
					</li>
				</ul>
			</div>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane active" id="home" role="tabpanel">
					<h1 class="pageHeader">Fitavations</h1>
					<h1 class="sectionHeader">Create a Fitavation</h1>
					<div class="container fitavationFormContainer">
						<div class="card userFitavations">
							<div class="card-header">
								<div class="row align-items-center justify-content-start">
									<div class="col-1">
										<?php printImageOthers($userImage); ?>
									</div>
									<div class="col-10">
										<?php echo $userDisplayName; ?>
									</div>
								</div>
							</div>
							<form id="fitavationForm" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
								<div class="card-body">
									<div class="form-group">
										<input name= "fitavationUserID" type="hidden" value="<?php echo $fitavationUserID['user_id']; ?>" />
										<textarea class="form-control" id="fitavationText" name="fitavationText" value="<?php echo $fitavationText['fitavation']; ?>" placeholder="Type your Fitavation Here..."  required></textarea>
									</div>
								</div>
								<div class="card-footer">
									<div class="row justify-content-end postFooter">
										<input id="submitFitavation" name="submitFitavation" type="submit" value="Post Fitavation" class="btn postFit" />
									</div>
								</div>
							</form>
							
						</div>
					</div>
					<h1 class="sectionHeader">Explore Fitavations</h1>
					<div class="container fitavationContainer">
						<?php foreach ($fitavationArray as $fitavation) :?>
							<div class="card userFitavations">
								<div class="card-header">
										<?php $secondUserInfo = createSecondaryUser($fitavation['user_id']); ?>
										<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
										<div class="row align-items-center justify-content-start">
											<div class="col-9">
													<input name= "saveSecUserID" type="hidden" value="<?php echo $fitavation['user_id']; ?>" />
													<button id="viewProfile" name="viewProfile" type="submit" class="row align-items-center justify-content-start viewProfile">
														<div class="col-1">
															<?php printImageOthers($secondUserInfo['userImage']); ?>
														</div>
														<div class="col-9">
															<?php echo $secondUserInfo['userDisplay']; ?>
														</div>
													</button>
											</div>
											<div class="col-2">
												<?php if ($fitavation['user_id'] != $userID) : ?>
													<?php if (in_array($fitavation['user_id'], $followCheck)):?>
														<button id="unfollowUser" name="unfollowUser" type="submit" class="btn" >Unfollow</button>
													<?php else: ?>
														<button id="followUser" name="followUser" type="submit" class="btn">Follow</button>
													<?php endif; ?>
												<?php endif; ?>
											</div>
										</div>
										</form>
								</div>
								<div class="card-body">
									<p><?= $fitavation['fitavation']?></p>
								</div>
								<div class="card-footer">
									<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
								
									</form>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
				<!--Shows the fitines of the user-->
				<div class="tab-pane fade" id="fitines" role="tabpanel">
					<h1 class="pageHeader">Fitines</h1>
					<h1 class="sectionHeader">My Fitines</h1>
					<div class="fitineTable">
						<div id="accordion">
							<div class="card">
								<div class="card-header">
									<a class="card-link" data-toggle="collapse" href="#collapseOne">
										Create New Fitine
									</a>
								</div>
								<div id="collapseOne" class="collapse show" data-parent="#accordion">
									<div class="card-body">
									<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" name="startNewFitine" >
											<div class ="form-group">
												<label for="newFitineName">Fitine Name</label>
												<input type="text" class="form-control" id="newFitineName" name="newFitineName" />
											</div>
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="radio" name="tempViewStatus" id="public" value="1" />
												<label class="form-check-label" for="public">Public</label>
											</div>
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="radio" name="tempViewStatus" id="private" value="0"/>
												<label class="form-check-label" for="private">Private</label>
											</div>
											<div class="form-inline justify-content-end">
												<input class="btn fitineSubmit" name="fitineSubmit" type="submit" value="New Fitine" />
											</div>
										</form>
									</div>
								</div>
							</div>
							<?php foreach ($userArray as $fitine) :?>
								<div class="card">
									<div class='card-header'>
										<a class='collapsed card-link' data-toggle='collapse' href='#<?= $fitine->fitineID?>'><?= $fitine->fitineName ?></a>
									</div>
									<div id="<?= $fitine->fitineID ?>" class="collapse" data-parent="#accordion">
										<div class="card-body">
											<?= $fitine->printFitine(); ?>
											<form class="form-row justify-content-between m-3" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
												<input name= "tempFitID" type="hidden" value="<?php echo $fitine->fitineID ?>" />
												<input id="fitineEdit" name="fitineEdit" type="submit" class="btn" value="Edit" />
												<input id="fitineDelete" name="fitineDelete" type="submit" class="btn" value="Delete"/>
											</form>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>

					<h1 class = "sectionHeader">Saved Fitines</h1>
					<div class="fitineTable">
						<div id="accordion">
							
							<?php foreach ($savedArray as $fitine) :?>
								<?php if($count == 0): ?>
									<div class="card">
										<div class="card-header">
											<a class="collapsed card-link" data-toggle="collapse" href="#collapseOn"><?= $fitine->fitineName ?></a>
										</div>
										<div id="collapseOn" class="collapse show" data-parent="#accordion">
											<div class="card-body">
												<?= $fitine->printFitine(); ?>
												<?php $count=1; ?>
												<form class="form-row justify-content-end m-3" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
													<input name= "tempSaveID" type="hidden" value="<?php echo $fitine->fitineID ?>" />
													<input id="unfollowFitine" name="unfollowFitine" type="submit" class="btn" value="Unfollow" />
												</form>
											</div>
										</div>
									</div>
								<?php else: ?>
									<div class="card">
										<div class="card-header">
											<a class='collapsed card-link' data-toggle='collapse' href='#<?= $fitine->fitineID?>'><?= $fitine->fitineName ?></a>
										</div>
										<div id="<?= $fitine->fitineID ?>" class="collapse" data-parent="#accordion">
											<div class="card-body">
												<?= $fitine->printFitine(); ?>
												<form class="form-row justify-content-end m-3" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
													<input name= "tempSaveID" type="hidden" value="<?php echo $fitine->fitineID ?>" />
													<input id="unfollowFitine" name="unfollowFitine" type="submit" class="btn" value="Unfollow" />
												</form>
											</div>
										</div>
									</div>
								<?php endif ?>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
				<!--Shows the user's follower-->
				<div class="tab-pane fade" id="followers" role="tabpanel">
					<?php foreach ($resultFollowers as $follower): ?>
						<div class="card">
  							<div class="card-body">
								<?php $userInfoFollowers = createSecondaryUser($follower['following_id']); ?>
							  	<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
									<input name= "saveSecUserID" type="hidden" value="<?php echo $follower['following_id']; ?>" />
									<button id="viewProfile" name="viewProfile" type="submit" class="btn">
										<?php printImageOthers($userInfoFollowers['userImage']); ?>
										<?php echo $userInfoFollowers['userDisplay']; ?>
									</button>
									<?php if(in_array($follower['following_id'], $followCheck)):?>
										<button id="unfollowUser" name="unfollowUser" type="submit" class="btn" >Unfollow</button>
									<?php else: ?>
										<button id="followUser" name="followUser" type="submit" class="btn">Follow</button>
									<?php endif; ?>
								</form>
  							</div>
						</div>
					<?php endforeach; ?>
				</div>
				<!--Shows who the user is following-->
				<div class="tab-pane fade" id="following" role="tabpanel">
					<?php foreach ($userFollowing as $following): ?>
						<div class="card">
							<div class="card-body">
								<?php $userInfoFollowing = createSecondaryUser($following['user_id']); ?>
							  	<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
									<input name= "saveSecUserID" type="hidden" value="<?php echo $following['user_id']; ?>" />
									<button id="viewProfile" name="viewProfile" type="submit" class="btn">
										<?php printImageOthers($userInfoFollowing['userImage']); ?>
										<?php echo $userInfoFollowing['userDisplay']; ?>
									</button>
									<?php if(in_array($following['user_id'], $followCheck)):?>
										<button id="unfollowUser" name="unfollowUser" type="submit" class="btn" >Unfollow</button>
									<?php else: ?>
										<button id="followUser" name="followUser" type="submit" class="btn">Follow</button>
									<?php endif; ?>
								</form>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>