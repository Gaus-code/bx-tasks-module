<section class="create wrapper">
	<form action="/tasks/create/status/" method="post" class="create__form">
		<label for="title">Title:</label>
		<input id="title" type="text" name="title">
		<label for="description">Description:</label>
		<textarea id="description" name="description"></textarea>
		<fieldset>
			<legend>Choose task priority:</legend>

			<div>
				<input type="radio" id="priority" name="priority" value="high" checked />
				<label for="high">High</label>
			</div>

			<div>
				<input type="radio" id="priority" name="priority" value="middle" />
				<label for="middle">Middle</label>
			</div>

			<div>
				<input type="radio" id="priority" name="priority" value="low" />
				<label for="low">Low</label>
			</div>
			<button type="submit">Send</button>
		</fieldset>
	</form>
</section>
