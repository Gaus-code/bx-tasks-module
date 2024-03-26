<?php
/**
 * @var array $arResult
 */
?>
<section class="create wrapper">
	<form action="<?=POST_FORM_ACTION_URI?>" method="post" class="create__form">
		<label for="title">Название:</label>
		<input id="title" type="text" name="TITTLE" required>
		<label for="description">Описание:</label>
		<textarea id="description" name="DESCRIPTION"></textarea>
		<fieldset>
			<legend>Выберите приоритетность:</legend>
			<div class="select" id="select-priority">
				<select name="PRIORITY">
					<?php foreach ($arResult['PRIORITY'] as $priority):?>
						<option value="<?= $priority['ID'] ?>"><?= $priority['TITLE'] ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</fieldset>
		<fieldset>
			<legend>Выберите отвественного:</legend>
			<div class="select" id="select-responsible">
				<select name="RESPONSIBLE">
					<?php foreach ($arResult['RESPONSIBLE'] as $responsible):?>
						<option value="<?= $responsible['ID'] ?>"><?= $responsible['NAME'] . ' ' . $responsible['SURNAME'] ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</fieldset>
		<button class="createBtn" type="submit">Отправить</button>
	</form>
</section>
