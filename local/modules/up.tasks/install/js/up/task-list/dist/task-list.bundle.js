/* eslint-disable */
this.BX = this.BX || {};
this.BX.Up = this.BX.Up || {};
(function (exports,main_core) {
	'use strict';

	var _templateObject, _templateObject2;
	var TaskList = /*#__PURE__*/function () {
	  function TaskList() {
	    var options = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {};
	    babelHelpers.classCallCheck(this, TaskList);
	    if (main_core.Type.isStringFilled(options.rootNodeId)) {
	      this.rootNodeId = options.rootNodeId;
	    } else {
	      throw new Error('TaskList: options.rootNodeId required');
	    }
	    this.rootNode = document.getElementById(this.rootNodeId);
	    if (!this.rootNode) {
	      throw new Error("TaskList: element with id \"".concat(this.rootNodeId, "\" not found"));
	    }
	    this.projectList = [];
	    this.reload();
	    var _TaskList = this;
	    document.addEventListener("click", function (event) {
	      if (event.target.matches('button') && null !== event.target.closest('.card__container')) {
	        var taskId = event.target.id;
	        _TaskList.deleteTask(taskId);
	        var card = event.target.closest('.card__container');
	        card.remove();
	      }
	    });
	  }
	  babelHelpers.createClass(TaskList, [{
	    key: "reload",
	    value: function reload() {
	      var _this = this;
	      this.loadList().then(function (projectList) {
	        _this.projectList = projectList;
	        _this.render();
	      });
	    }
	  }, {
	    key: "loadList",
	    value: function loadList() {
	      return new Promise(function (resolve) {
	        BX.ajax.runAction('up:tasks.task.getList', {
	          data: {}
	        }).then(function (response) {
	          var projectList = response.data.projectList;
	          resolve(projectList);
	        })["catch"](function (error) {
	          console.error(error);
	        });
	      });
	    }
	  }, {
	    key: "formatDate",
	    value: function formatDate(dateString) {
	      var updateDate = new Date(dateString);
	      var day = updateDate.getDate();
	      var month = updateDate.getMonth() + 1;
	      var hours = updateDate.getHours();
	      var minutes = updateDate.getMinutes();
	      return "".concat(day, ".").concat(month, " ").concat(hours, ":").concat(minutes);
	    }
	  }, {
	    key: "render",
	    value: function render() {
	      var _this2 = this;
	      this.rootNode.innerHTML = '';
	      var moviesContainerNode = main_core.Tag.render(_templateObject || (_templateObject = babelHelpers.taggedTemplateLiteral(["<div class=\"section__container wrapper\"></div>"])));
	      this.projectList.forEach(function (projectData) {
	        var formattedDeadline = _this2.formatDate(projectData.DEADLINE);
	        var formattedDate = _this2.formatDate(projectData.UPDATED_AT);
	        var projectNode = main_core.Tag.render(_templateObject2 || (_templateObject2 = babelHelpers.taggedTemplateLiteral(["\n\t\t\t\t<div class=\"card\" id=\"", "\">\n\t\t\t\t\t<div class=\"card__container\">\n\t\t\t\t\t\t<div class=\"card__header\">\n\t\t\t\t\t\t\t<h3 class=\"card__title\">", "</h3>\n\t\t\t\t\t\t\t<div class=\"card__fav\">\n\t\t\t\t\t\t\t\t*\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"card__content\">\n\t\t\t\t\t\t\t<p class=\"card__description\">", "</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"card__footer\">\n\t\t\t\t\t\t\t<div class=\"card__lastActivity\">Last Activity: <br>", "</div>\n\t\t\t\t\t\t\t<div class=\"card__showDetails\">Deadline: <br> ", "</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<button id=\"", "\">delete task</button>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t"])), projectData['ID'], projectData.TITLE, projectData.DESCRIPTION, formattedDate, formattedDeadline, projectData['ID']);
	        moviesContainerNode.appendChild(projectNode);
	      });
	      this.rootNode.appendChild(moviesContainerNode);
	    }
	  }, {
	    key: "deleteTask",
	    value: function deleteTask(taskId) {
	      return new Promise(function (resolve, reject) {
	        BX.ajax.runAction('up:tasks.task.deleteTask', {
	          data: {
	            taskId: Number(taskId)
	          }
	        }).then(function (response) {
	          console.log(response);
	        })["catch"](function (error) {
	          reject(error);
	        });
	      });
	    }
	  }]);
	  return TaskList;
	}();

	exports.TaskList = TaskList;

}((this.BX.Up.Tasks = this.BX.Up.Tasks || {}),BX));
