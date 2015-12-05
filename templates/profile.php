	<link href="assets/css/profile.css" rel="stylesheet">
</head>
<body>
	<?php include 'navbar.php'; ?>

	<div class="container-fluid">
		
			<h1 class="page-header">Profile</h1>
			<h1 class="profile-greeting">Welcome, <?= $_SESSION['username'] ?>.</h1>

				<div class="main">

					<div class="profile-pic">
						<img id="currentImage" src="<?= isset($_SESSION['image']) ? UPLOADS_URL . "/" . $_SESSION['image'] : 'assets/img/blank-profile.png' ?>" class="img-responsive" alt="Blank profile picture"  data-toggle="modal" data-target="#uploadImageModal">
						<?php include 'uploadImageModal.php'; ?>
					</div>
						
						<div class="edit-profile">

							<!-- Modal -->
							<div class="modal fade" id="editPasswordModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">

										<form class="form-edit-password" role="form" action="actions.php?action=editPassword" method="POST">
											<div class="modal-body">
												<div id="inputPasswordDiv" class="form-group">
													<input type="password" name="newPassword" id="inputPassword" class="form-control" placeholder="New password" required autofocus>
												</div>
												<div id="inputPasswordConfirmDiv" class="form-group">
													<input type="password" id="inputPasswordConfirmation" class="form-control" name="newPasswordConfirmation" placeholder="Confirm new password" required>
												</div>
											</div>

											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
												<button type="submit" class="btn btn-primary">Save changes</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
						
						<!--last login date and register date -->
						<div class="userLastLoginAndRegister">
							<h5><b>Last login:</b> <?=$_SESSION['lastLoginDate'];?></h5>
							<h5><b>Register date:</b> <?=$_SESSION['registerDate'];?></h5>
						</div>


				</div>
	</div>