<?php

\Bitrix\Main\UI\Extension::load('up.task-list');

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>
<section id="task-list-app" class="section"></section>

<script>
	BX.ready(function () {
		window.TasksTaskList = new BX.Up.Tasks.TaskList({
			rootNodeId: 'task-list-app',
		});
	});
</script>


