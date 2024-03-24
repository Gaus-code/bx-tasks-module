<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Task edit");

$APPLICATION->IncludeComponent('up:tasks.edit', '', [
	'ID' => (int)$_REQUEST['id'],
]);
