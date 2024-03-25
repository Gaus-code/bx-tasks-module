/* eslint-disable */
this.BX = this.BX || {};
this.BX.Up = this.BX.Up || {};
(function (exports,main_core) {
	'use strict';

	var _templateObject, _templateObject2;
	var TaskList = /*#__PURE__*/function () {
	  function TaskList() {
	    var options = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {
	      name: 'TaskList'
	    };
	    babelHelpers.classCallCheck(this, TaskList);
	    this.name = options.name;
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
	    key: "render",
	    value: function render() {
	      this.rootNode.innerHTML = '';
	      var moviesContainerNode = main_core.Tag.render(_templateObject || (_templateObject = babelHelpers.taggedTemplateLiteral(["<div class=\"section__container wrapper\"></div>"])));
	      this.projectList.forEach(function (projectData) {
	        var projectNode = main_core.Tag.render(_templateObject2 || (_templateObject2 = babelHelpers.taggedTemplateLiteral(["\n\t\t\t\t<a href=\"/tasks/", "/\" class=\"card\">\n\t\t\t\t\t<div class=\"card__container\">\n\t\t\t\t\t\t<div class=\"card__header\">\n\t\t\t\t\t\t\t<h3 class=\"card__title\">", "</h3>\n\t\t\t\t\t\t\t<div class=\"card__fav\">\n\t\t\t\t\t\t\t\t*\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"card__content\">\n\t\t\t\t\t\t\t<p class=\"card__description\">", "</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"card__footer\">\n\t\t\t\t\t\t\t<div class=\"card__lastActivity\">Last Activity <br>", "</div>\n\t\t\t\t\t\t\t<div class=\"card__showDetails\">Deadline <br> ", "</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</a>\n\t\t\t"])), projectData.ID, projectData.TITLE, projectData.DESCRIPTION, projectData.UPDATED_AT, projectData.DEADLINE);
	        moviesContainerNode.appendChild(projectNode);
	      });
	      this.rootNode.appendChild(moviesContainerNode);
	    }
	  }, {
	    key: "setName",
	    value: function setName(name) {
	      if (main_core.Type.isString(name)) {
	        this.name = name;
	      }
	    }
	  }, {
	    key: "getName",
	    value: function getName() {
	      return this.name;
	    }
	  }]);
	  return TaskList;
	}();

	exports.TaskList = TaskList;

}((this.BX.Up.Tasks = this.BX.Up.Tasks || {}),BX));
