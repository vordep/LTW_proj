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
					<input type="text" placeholder="Title"name="title" required autofocus>
				</div>
				<div class="event-Type">
					<input type="hidden" id="type" name="inputType" value="" required placeholder="category">
					<select name="inputType" id="" placeholder="Category">
						<option n="1">Party</option>
						<option n="2">Concert</option>
						<option n="3">Conference</option>
						<option n="4">Meet</option>
						<option n="5">Reunion</option>
					</select>
				</div>
				<div class="event-privacy">
					<label><input type="checkbox" id="isPublic" name="isPublic" value="Yes"> Private</label>
				</div>
				<div class="event-date">
				<input type="date" name = "date">
				</div>
				<div class="event-description">
					<textarea name="description" rows="10" cols="30" required>Add Event Description</textarea>

				</div>
				<div class="event-image">
<<<<<<< HEAD
					<input type="file" name="eventimage" value='' enctype="multipart/form-data">
=======
					<input type="file" name="event-image">
>>>>>>> origin/master
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="">Cancel</button>
				<button type="submit"> Save Changes</button>
			</div>
		</form>
	</div>

</div>