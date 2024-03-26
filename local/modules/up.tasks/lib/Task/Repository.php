<?php
namespace Up\Tasks\Task;

use Up\Tasks\Model\TaskTable;

class Repository
{
	public static function getPage(int $itemsPerPage, int $pageNumber): array
	{
		if ($pageNumber > 1)
		{
			$offset = $itemsPerPage * ($pageNumber - 1);
		}
		else
		{
			$offset = 0;
		}

		$taskList = TaskTable::getList([
			'select' => [
				'ID',
				'TITLE',
				'DESCRIPTION',
				'UPDATED_AT',
				'DEADLINE'
			],
			'limit' => $itemsPerPage,
			'offset' => $offset,
		])->fetchAll();

		return $taskList;
	}

	public static function deleteTask(int $taskId): bool
	{
		$result = TaskTable::delete($taskId);

		if (!$result->isSuccess())
		{
			throw new \Exception($result->getErrors());
		}

		return true;
	}
}