<section class="editSection wrapper">
	<div class="editSection__container">
		<p class="editSection__title"> Edit task with title: titletitle</p>
	</div>
</section>
<section id="edit" class="edit">
	<div class="edit__container wrapper">
		<form class="edit__form" action="/tasks/12345/" method="post">
			<label for="status">Change status</label>
			<select id="status" class="dropdown">
				<option class="dropdown-menu" >New</option>
				<option class="dropdown-menu">In Progress</option>
				<option class="dropdown-menu">Done</option>
				<option class="dropdown-menu">On Review</option>
				<option class="dropdown-menu">Canceled</option>
			</select>
			<label for="status">Change priority</label>
			<select id="status" class="dropdown">
				<option class="dropdown-menu">High</option>
				<option class="dropdown-menu">Middle</option>
				<option class="dropdown-menu">Low</option>
			</select>
			<button class="edit__btn" type="submit">Send</button>
		</form>
	</div>
</section>