	<link href="assets/css/profile.css" rel="stylesheet">
</head>
<body>
	<?php include 'navbar.php';?>

	<div id="container-main">
		
			<h1 class="page-header"> <?= $_SESSION['username'] ?> Profile</h1>

				<div class="main">

					<div class="profile-pic">
					<h3>Profile picture</h3>
						<img id="currentImage" src="<?= isset($_SESSION['image']) ? UPLOADS_URL . "/" . $_SESSION['image'] : 'assets/img/default-user.png' ?>" class="img-responsive" alt="Default profile picture"  data-toggle="modal" data-target="#uploadImageModal">
						<!-- <?php include 'uploadImageModal.php'; ?> !-->
					<div id="wrap">
						  <h2>Change profile picture:</h2>
           					<input id="file_upload" type="file" name="files[]" />
       	 			</div>


					</div>
						
						<div class="edit-profile">

							<div class="edit-pwd" id="editPassword" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="change-pwd">

										<form class="form-edit-password" role="form" action="actions.php?action=editpassword" method="POST">

											<div class="pwd-change-form">

												<h3>Change password</h3>

												<div id="inputPassword" class="form-group">
													<input type="password" name="actualPassword" id="inputPassword" class="form-control" placeholder="Actual password" required autofocus>
												</div>

												<div id="inputPassword" class="form-group">
													<input type="password" name="newPassword" id="inputPassword" class="form-control" placeholder="New password" required autofocus>
												</div>

												<div id="inputPasswordConfirm" class="form-group">
													<input type="password" name="newPasswordConfirmation" id="inputPasswordConfirmation" class="form-control" placeholder="Confirm new password" required>
												</div>

											</div>

											<div class="apply-changes">
												<button type="submit" class="save-btn"> Save changes </button>
												<button type="button" class="cancel-btn" data-dismiss="modal"> Cancel </button>
											</div>

										</form>
								</div>

							</div>
						</div>
						
						<div class="signInformation">
							<h5><b>Last login:</b> <?=$_SESSION['lastLogin'];?></h5>
							<h5><b>Register date:</b> <?=$_SESSION['registerDate'];?></h5>
						</div>

				</div>
	</div>
