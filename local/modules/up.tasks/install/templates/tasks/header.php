<?php
/**
 * @var CMain $APPLICATION
 */
?>
<!doctype html>
<html lang="<?= LANGUAGE_ID ?>">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?php $APPLICATION->ShowTitle() ?></title>
	<?php $APPLICATION->ShowHead(); ?>
	<link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/assets/css/styles.css">
</head>
<?php $APPLICATION->ShowPanel() ?>
<body>

<header class="header">
	<div class="header__wrapper">
		<a href="/" class="header__logoContainer">
			<img src="<?= SITE_TEMPLATE_PATH ?>/assets/images/bitrix24.svg" alt="logo">
		</a>
		<div class="header__taskContainer">
			<a href="/tasks/create/" class="header__taskCreate" type="button">Create New</a>
		</div>
	</div>
</header>


