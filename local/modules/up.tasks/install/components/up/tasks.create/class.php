<?php
use Up\Tasks\Model\PriorityTable,
	Up\Tasks\Model\TaskTable,
	Up\Tasks\Model\UserTable,
	Bitrix\Main\Context;

class TasksCreateComponent extends CBitrixComponent
{
	public function executeComponent()
	{
		try
		{
			$this->fetchTaskPriority();
			$this->fetchTaskResponsible();
			$this->includeComponentTemplate();

			if (Context::getCurrent()->getRequest()->isPost())
			{
				$this->addTask();
			}
		}
		catch (Exception $e)
		{
			ShowError($e->getMessage());
		}
	}

	protected function fetchTaskResponsible(): void
	{
		$responsibleList = UserTable::getList([
			'select' => ['ID', 'NAME', 'SURNAME']
		])->fetchAll();

		$this->arResult['RESPONSIBLE'] = $responsibleList;

	}

	protected function fetchTaskPriority(): void
	{
		$priorityList = PriorityTable::getList([
			'select' => ['ID', 'TITLE']
		])->fetchAll();

		$this->arResult['PRIORITY'] = $priorityList;
	}

	protected function addTask(): void
	{
		$task = Context::getCurrent()->getRequest()->getPostList()->toArray();

		if (!trim($task['TASK']) || !trim($task['RESPONSIBLE']) || !trim($task['PRIORITY']))
		{
			throw new Exception('All fields must be hidden');
		}

		$responsibleId = (int)$task['RESPONSIBLE'];
		$priorityID = (int)$task['PRIORITY'];

		$result = TaskTable::add([
			'TITTLE' => $task['TITTLE'],
			'DESCRIPTION' => $task['DESCRIPTION'],
			'USER_ID' => $responsibleId,
			'PRIORITY_ID' => $priorityID,
			'STATUS_ID' => 1
		]);

		if ($result->isSuccess())
		{
			ShowMessage(['TYPE' => 'OK', 'MESSAGE' => 'Задача успешно добавлена']);
		}
	}
}