<?php
namespace Up\Tasks\Model;

use Bitrix\Main\Localization\Loc,
	Bitrix\Main\ORM\Data\DataManager,
	Bitrix\Main\ORM\Fields\IntegerField,
	Bitrix\Main\ORM\Fields\StringField,
	Bitrix\Main\ORM\Fields\Validators\LengthValidator;

Loc::loadMessages(__FILE__);

/**
 * Class UserTable
 *
 * Fields:
 * <ul>
 * <li> ID int mandatory
 * <li> ROLE_ID int mandatory
 * <li> NAME string(51) mandatory
 * <li> SURNAME string(51) mandatory
 * <li> EMAIL string(150) mandatory
 * <li> PASSWORD string(32) mandatory
 * </ul>
 *
 * @package Bitrix\Tasks
 **/

class UserTable extends DataManager
{
	/**
	 * Returns DB table name for entity.
	 *
	 * @return string
	 */
	public static function getTableName()
	{
		return 'up_tasks_user';
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
			))->configureTitle(Loc::getMessage('USER_ENTITY_ID_FIELD'))
				->configurePrimary(true)
				->configureAutocomplete(true),
			(new IntegerField('ROLE_ID',
				[]
			))->configureTitle(Loc::getMessage('USER_ENTITY_ROLE_ID_FIELD'))
				->configureRequired(true),
			(new StringField('NAME',
				[
					'validation' => [__CLASS__, 'validateName']
				]
			))->configureTitle(Loc::getMessage('USER_ENTITY_NAME_FIELD'))
				->configureRequired(true),
			(new StringField('SURNAME',
				[
					'validation' => [__CLASS__, 'validateSurname']
				]
			))->configureTitle(Loc::getMessage('USER_ENTITY_SURNAME_FIELD'))
				->configureRequired(true),
			(new StringField('EMAIL',
				[
					'validation' => [__CLASS__, 'validateEmail']
				]
			))->configureTitle(Loc::getMessage('USER_ENTITY_EMAIL_FIELD'))
				->configureRequired(true),
			(new StringField('PASSWORD',
				[
					'validation' => [__CLASS__, 'validatePassword']
				]
			))->configureTitle(Loc::getMessage('USER_ENTITY_PASSWORD_FIELD'))
				->configureRequired(true),
		];
	}

	/**
	 * Returns validators for NAME field.
	 *
	 * @return array
	 */
	public static function validateName()
	{
		return [
			new LengthValidator(null, 51),
		];
	}

	/**
	 * Returns validators for SURNAME field.
	 *
	 * @return array
	 */
	public static function validateSurname()
	{
		return [
			new LengthValidator(null, 51),
		];
	}

	/**
	 * Returns validators for EMAIL field.
	 *
	 * @return array
	 */
	public static function validateEmail()
	{
		return [
			new LengthValidator(null, 150),
		];
	}

	/**
	 * Returns validators for PASSWORD field.
	 *
	 * @return array
	 */
	public static function validatePassword()
	{
		return [
			new LengthValidator(null, 32),
		];
	}
}