<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Task create");

$APPLICATION->IncludeComponent('up:tasks.create', '', []);


