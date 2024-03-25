import {Type, Tag, Loc} from 'main.core';

export class TaskList
{
	constructor(options = {name: 'TaskList'})
	{
		this.name = options.name;
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

	render()
	{
		this.rootNode.innerHTML = '';
		const moviesContainerNode = Tag.render`<div class="section__container wrapper"></div>`;

		this.projectList.forEach(projectData => {
			const projectNode = Tag.render`
				<a href="/tasks/${projectData.ID}/" class="card">
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
							<div class="card__lastActivity">Last Activity <br>${projectData.UPDATED_AT}</div>
							<div class="card__showDetails">Deadline <br> ${projectData.DEADLINE}</div>
						</div>
					</div>
				</a>
			`;

			moviesContainerNode.appendChild(projectNode);
		});

		this.rootNode.appendChild(moviesContainerNode);
	}
	setName(name)
	{
		if (Type.isString(name))
		{
			this.name = name;
		}
	}

	getName()
	{
		return this.name;
	}
}
