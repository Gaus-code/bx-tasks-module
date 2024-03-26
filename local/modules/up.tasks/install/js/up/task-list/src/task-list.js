import {Type, Tag, Loc} from 'main.core';

export class TaskList
{
	constructor(options = {})
	{
		if (Type.isStringFilled(options.rootNodeId))
		{
			this.rootNodeId = options.rootNodeId;
		}
		else
		{
			throw new Error('TaskList: options.rootNodeId required');
		}
		this.rootNode = document.getElementById(this.rootNodeId);
		if (!this.rootNode)
		{
			throw new Error(`TaskList: element with id "${this.rootNodeId}" not found`);
		}

		this.projectList = [];
		this.reload();

		let TaskList = this;
		document.addEventListener("click", function(event) {
			if(event.target.matches('button') && null !== event.target.closest('.card__container')) {
				let taskId = event.target.id;
				TaskList.deleteTask(taskId);
				let card = event.target.closest('.card__container');
				card.remove();
			}
		});
	}

	reload()
	{
		this.loadList()
			.then(projectList => {
				this.projectList = projectList;
				this.render();
			});
	}

	loadList()
	{
		return new Promise((resolve) => {
			BX.ajax.runAction(
				'up:tasks.task.getList',
				{
					data: {}
				})
				.then((response) => {
					const projectList = response.data.projectList;

					resolve(projectList);
				})
				.catch((error) => {
						console.error(error);
					}
				);
		});
	}

	formatDate(dateString) {
		const updateDate = new Date(dateString);
		const day = updateDate.getDate();
		const month = updateDate.getMonth() + 1;
		const hours = updateDate.getHours();
		const minutes = updateDate.getMinutes();
		return `${day}.${month} ${hours}:${minutes}`;
	}
	render()
	{
		this.rootNode.innerHTML = '';
		const moviesContainerNode = Tag.render`<div class="section__container wrapper"></div>`;

		this.projectList.forEach(projectData => {
			let formattedDeadline = this.formatDate(projectData.DEADLINE);
			let formattedDate = this.formatDate(projectData.UPDATED_AT);
			const projectNode = Tag.render`
				<div class="card" id="${projectData['ID']}">
					<div class="card__container">
						<div class="card__header">
							<h3 class="card__title">${projectData.TITLE}</h3>
							<div class="card__fav">
								*
							</div>
						</div>
						<div class="card__content">
							<p class="card__description">${projectData.DESCRIPTION}</p>
						</div>
						<div class="card__footer">
							<div class="card__lastActivity">Last Activity: <br>${formattedDate}</div>
							<div class="card__showDetails">Deadline: <br> ${formattedDeadline}</div>
						</div>
						<button class="deleteBtn" id="${projectData['ID']}">delete task</button>
					</div>
				</div>
			`;
			moviesContainerNode.appendChild(projectNode);
		});

		this.rootNode.appendChild(moviesContainerNode);
	}
	deleteTask(taskId)
	{
		return new Promise((resolve, reject) => {
			BX.ajax.runAction(
				'up:tasks.task.deleteTask',
				{data: {
						taskId: Number(taskId),
					},
				})
				.then((response) => {
					console.log(response);
				})
				.catch((error) => {
					reject(error);
				})
			;
		});
	}
}
