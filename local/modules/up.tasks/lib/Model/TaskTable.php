<?php

namespace Up\Tasks\Model;

use Bitrix\Main\Localization\Loc,
	Bitrix\Main\ORM\Data\DataManager,
	Bitrix\Main\ORM\Fields\DatetimeField,
	Bitrix\Main\ORM\Fields\IntegerField,
	Bitrix\Main\ORM\Fields\StringField,
	Bitrix\Main\ORM\Fields\TextField,
	Bitrix\Main\ORM\Fields\Validators\LengthValidator,
	Bitrix\Main\Type\DateTime;

Loc::loadMessages(__FILE__);

/**
 * Class TaskTable
 *
 * Fields:
 * <ul>
 * <li> ID int mandatory
 * <li> USER_ID int mandatory
 * <li> TITLE string(255) mandatory
 * <li> DESCRIPTION text optional
 * <li> CREATED_AT datetime optional default current datetime
 * <li> UPDATED_AT datetime optional default current datetime
 * <li> COMPLETED_AT datetime optional default current datetime
 * <li> PRIORITY_ID int optional default 1
 * <li> STATUS_ID int optional default 1
 * <li> DEADLINE datetime optional
 * </ul>
 *
 * @package Bitrix\Tasks
 **/

class TaskTable extends DataManager
{
	/**
	 * Returns DB table name for entity.
	 *
	 * @return string
	 */
	public static function getTableName()
	{
		return 'up_tasks_task';
	}

	/**
	 * Returns entity map definition.
	 *
	 * @return array
	 */
	public static function getMap()
	{
		return [
			(new IntegerField('ID',
				[]
			))->configureTitle(Loc::getMessage('TASK_ENTITY_ID_FIELD'))
				->configurePrimary(true)
				->configureAutocomplete(true),
			(new IntegerField('USER_ID',
				[]
			))->configureTitle(Loc::getMessage('TASK_ENTITY_USER_ID_FIELD'))
				->configureRequired(true),
			(new StringField('TITLE',
				[
					'validation' => [__CLASS__, 'validateTitle']
				]
			))->configureTitle(Loc::getMessage('TASK_ENTITY_TITLE_FIELD'))
				->configureRequired(true),
			(new TextField('DESCRIPTION',
				[]
			))->configureTitle(Loc::getMessage('TASK_ENTITY_DESCRIPTION_FIELD')),
			(new DatetimeField('CREATED_AT',
				[]
			))->configureTitle(Loc::getMessage('TASK_ENTITY_CREATED_AT_FIELD'))
				->configureDefaultValue(function()
				{
					return new DateTime();
				}),
			(new DatetimeField('UPDATED_AT',
				[]
			))->configureTitle(Loc::getMessage('TASK_ENTITY_UPDATED_AT_FIELD'))
				->configureDefaultValue(function()
				{
					return new DateTime();
				}),
			(new DatetimeField('COMPLETED_AT',
				[]
			))->configureTitle(Loc::getMessage('TASK_ENTITY_COMPLETED_AT_FIELD'))
				->configureDefaultValue(function()
				{
					return new DateTime();
				}),
			(new IntegerField('PRIORITY_ID',
				[]
			))->configureTitle(Loc::getMessage('TASK_ENTITY_PRIORITY_ID_FIELD'))
				->configureDefaultValue(1),
			(new IntegerField('STATUS_ID',
				[]
			))->configureTitle(Loc::getMessage('TASK_ENTITY_STATUS_ID_FIELD'))
				->configureDefaultValue(1),
			(new DatetimeField('DEADLINE',
				[]
			))->configureTitle(Loc::getMessage('TASK_ENTITY_DEADLINE_FIELD')),
		];
	}

	/**
	 * Returns validators for TITLE field.
	 *
	 * @return array
	 */
	public static function validateTitle()
	{
		return [
			new LengthValidator(null, 255),
		];
	}
}