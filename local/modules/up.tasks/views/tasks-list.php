<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Task list");

$APPLICATION->IncludeComponent('up:tasks.list', '', [
	'DATE_FORMAT' => 'd.M H:i',
]);

