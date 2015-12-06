<script src="assets/script/date.js"></script>
</head>
<div id="openModal" class="modalDialog">
	<div>
		<a href="#close" title="Close" class="close">X</a>
		<div class="modal-header">
			<h4>Add new Event</h4>
		</div>
		<form action="actions.php?action=addevent" method="POST">
			<div class="modal-body">
				<div class="event-title">
					<input type="text" placeholder="Title">
				</div>
				<div class="event-Type">
					<input type="hidden" id="type" name="inputType" value="">
					<select name="Type" id="">
						<option value="1">Party</option>
						<option value="2">Concert</option>
						<option value="3">Conference</option>
						<option value="4">Meet</option>
						<option value="5">Reunion</option>
					</select>
				</div>
				<div class="event-privacy">
					<label>
						<input type="checkbox" id="isPublic" name="isPublic" value="Yes"> Private</label>
				</div>
			
				<div class="event-description">
					<textarea name="message" rows="10" cols="30">Add Event Description</textarea>

				</div>
				<div class="event-image">
					<input type="file" name="event-pic">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="">Cancel</button>
				<button type="submit"> Save Changes</button>
			</div>
		</form>
	</div>

</div>