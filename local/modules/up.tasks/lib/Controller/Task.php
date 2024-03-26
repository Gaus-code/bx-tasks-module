<?php
namespace Up\Tasks\Controller;

use Bitrix\Main\Engine;
use Bitrix\Main\Error;
use Up\Tasks\Project\Repository;

class Task extends Engine\Controller
{
	protected const PROJECT_PER_PAGE = 20;
	public function getListAction(int $pageNumber = 1): ?array
	{
		if ($pageNumber < 0)
		{
			$this->addError(new Error('pageNumber should be greater than 0', 'invalid_page_number'));

			return null;
		}

		$taskList = Repository::getPage(self::PROJECT_PER_PAGE, $pageNumber);
		return [
			'pageNumber' => $pageNumber,
			'projectList' => $taskList,
		];
	}

	public function deleteTaskAction(int $taskId): ?bool
	{
		try
		{
			Repository::deleteTask($taskId);

			return true;
		}
		catch (\Exception $error)
		{
			$this->addError(new Error($error->getMessage()));

			return null;
		}
	}
}