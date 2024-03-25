<?php

\Bitrix\Main\UI\Extension::load('up.task-list');

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>
<section id="task-list-app" class="section"></section>
<section class="pagination wrapper">
	<div class="pagination__container">
		<a href="#">&laquo;</a>
		<a href="#" class="active">1</a>
		<a href="#">2</a>
		<a href="#">3</a>
		<a href="#">4</a>
		<a href="#">5</a>
		<a href="#">6</a>
		<a href="#">&raquo;</a>
	</div>
</section>

<script>
	BX.ready(function () {
		window.TasksTaskList = new BX.Up.Tasks.TaskList({
			rootNodeId: 'task-list-app',
		});
	});
</script>


