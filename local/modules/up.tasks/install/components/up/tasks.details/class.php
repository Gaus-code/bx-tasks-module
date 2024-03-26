<?php


use Up\Tasks\Services\Repository\TaskService;

class TasksDetailsComponent extends CBitrixComponent
{
	protected const PROJECT_PER_PAGE = 20;
	public function executeComponent()
	{
		$this->includeComponentTemplate();
		$this->fetchProjectData();
	}

	public function onPrepareComponentParams($arParams)
	{
		$arParams['ID'] = (int)$arParams['ID'];
		if ($arParams['ID'] <= 0)
		{
			throw new Exception('ID is not provided');
		}
		return $arParams;
	}

	protected function fetchProjectData()
	{
		$taskList = [['id'=>1, 'name'=>'name1'], ['id'=>1, 'name'=>'name1']];

		$this->arResult['ABC'] = $taskList;
	}
}