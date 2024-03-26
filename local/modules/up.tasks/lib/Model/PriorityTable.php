<?php
namespace Up\Tasks\Model;

use Bitrix\Main\Localization\Loc,
	Bitrix\Main\ORM\Data\DataManager,
	Bitrix\Main\ORM\Fields\IntegerField,
	Bitrix\Main\ORM\Fields\StringField,
	Bitrix\Main\ORM\Fields\Validators\LengthValidator;

Loc::loadMessages(__FILE__);

/**
 * Class PriorityTable
 *
 * Fields:
 * <ul>
 * <li> ID int mandatory
 * <li> TITLE string(70) mandatory
 * </ul>
 *
 * @package Bitrix\Tasks
 **/

class PriorityTable extends DataManager
{
	/**
	 * Returns DB table name for entity.
	 *
	 * @return string
	 */
	public static function getTableName()
	{
		return 'up_tasks_priority';
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
			))->configureTitle(Loc::getMessage('PRIORITY_ENTITY_ID_FIELD'))
				->configurePrimary(true)
				->configureAutocomplete(true),
			(new StringField('TITLE',
				[
					'validation' => [__CLASS__, 'validateTitle']
				]
			))->configureTitle(Loc::getMessage('PRIORITY_ENTITY_TITLE_FIELD'))
				->configureRequired(true),
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
			new LengthValidator(null, 70),
		];
	}
}