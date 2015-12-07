<?php
include 'templates/navbar.php';
?>

</head>
<body>
	<div id="container-main">
		<div class="row">
			<div class="col-sm-12 col-md-12 main">
				<div class="my-polls-header page-header row">
					<h1 class="my-polls-header-title pull-left" id="modalPreviousPage" value=<?=$previousPage; ?>> <?=$previousPage; ?></h1>
				</div>

				<div class="modal fade" id="viewPollModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">
									<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
								</button>
								<h3 class="modal-title" id="myModalLabel"> <?= $poll['title'] ?> </h3>

								<div class="row">
									<h4 id="viewPollModalCategory" class="modal-category col-xs-6 col-sm-3 col-md-3"> <?= $poll['category'] ?></h4>

									<div id="viewPollModalPrivacy" class="add-poll-modal-checkbox col-xs-6 col-sm-9 col-md-9">
										<?php
										if($poll['isPrivate'] === '1') {
											$checkboxVal = "checked"; 
											$value = "private";
										}
										else {
											$checkboxVal = ""; 
											$value = "public";
										}
										if($_SESSION['idUser'] === $poll['idUser']) 
											$isDisabled = "enabled"; 
										else $isDisabled = "disabled"; ?>
										<label><input type="checkbox" id="privacyChanged" name="isPrivate" value=<?=$value ?> <?=$checkboxVal ?> <?=$isDisabled ?> idPoll=<?=$idPoll ?> > Private</label>
									</div>
								</div>
							</div>

							<form id="answerPoll" method="POST" action=<?="actions.php?action=answerPoll&id=".$idPoll ?> >
								<div class="content-fluid">
									<div class="modal-body">
										<?php
										$i=0; $questionsFacebook = "";
										foreach($poll['questions'] as &$currentQuestion): ?>
										<div id="poll-question" align="left">
											<div class="form-group-lg">
												<label><?=$currentQuestion['question']; $questionsFacebook .= $currentQuestion['question'] . ' ';?></label>
											</div>
											<div class="form-group-sm">
												<?php foreach($currentQuestion['options'] as $currentOption): ?>
													<div class="radio">
														<label><input type="radio" name=<?="".$i ?> value=<?="".$currentQuestion['idQuestion']."-".$currentOption['idOption'] ?>>
															<p><?= $currentOption['option'] ?></p>
														</label>
													</div>
												<?php endforeach; ?>
											</div>
										</div>
										<?php $i++; endforeach; ?>
									</div>

									<div class="modal-footer">
										<div class="row">
											<div id="share-url-div" class="col-xs-12 col-sm-9">
												<?php
												$pollURL = dirname("http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']) . "/index.php?page=viewPoll&id=" . $idPoll;
												$googlePlusTwitterPollURL = urlencode($pollURL);
												$iPod = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
												$iPhone = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
												$iPad = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
												$Android= stripos($_SERVER['HTTP_USER_AGENT'],"Android");
												$webOS= stripos($_SERVER['HTTP_USER_AGENT'],"webOS");
												if ($iPod || $iPhone || $iPad || $Android || $webOS) { ?>
												<input id="share-url-field" type="text" class="form-control" value=<?=$pollURL?> onClick="this.setSelectionRange(0, this.value.length)" readonly>
												<?php } else { ?>
												<div class="input-group">
													<span id="tooltip_span" data-placement="bottom" title="Copied" class="input-group-btn">
														<button id="click-to-copy" data-toggle="tooltip" data-placement="bottom" title="Copy to clipboard"  data-clipboard-target="share-url-field" class="btn btn-default" type="button">
															<span class="glyphicon glyphicon-link" aria-hidden="true"></span>
														</button>
													</span>

													<input id="share-url-field" type="text" class="form-control" value=<?=$pollURL?> onClick="this.setSelectionRange(0, this.value.length)" readonly>
												</div>
												<?php }?>
											</div>

											<div id="share-buttons" class="col-xs-12 col-sm-3">
												<a href="<?=$pollURL?>" target="_blank">
													<img src="assets/img/facebook.png" alt="Facebook" id="share-button-facebook"/>
												</a>

												<a href="https://plus.google.com/share?url=<?=$googlePlusTwitterPollURL?>" target="_blank" id="share-button-googleplus">
													<img src="assets/img/google.png" alt="Google"/>
												</a>

												<a href="http://twitter.com/intent/tweet?url=<?=$googlePlusTwitterPollURL?>&text=<?=$poll['title']?>&hashtags=pollhub" target="_blank">
													<img src="assets/img/twitter.png" alt="Twitter" />
												</a>
											</div>

											<div id="view-poll-buttons" class="col-xs-12 col-md-12">
												<div class="row">
													<div id="show-poll-results-button" class="col-xs-12 col-sm-3">
														<a href=<?= "index.php?page=viewPollResults&id=" . $idPoll . "&previous=" . urlencode($previousPage) ?>>
															<input type="button" id="seeResultsBtn" class="btn btn-default" value="Show results">
														</a>
													</div>

													<div id="view-poll-cancel-button" class="col-xs-6 col-sm-offset-3 col-sm-3">
														<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
													</div>
													<div id="view-poll-save-button" class="col-xs-6 col-sm-3">
														<button type="submit" class="btn btn-primary col-xs-6 col-sm-6">Save changes</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>