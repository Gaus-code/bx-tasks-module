CREATE TABLE IF NOT EXISTS up_tasks_user
(
    ID       INT          NOT NULL AUTO_INCREMENT,
    ROLE_ID  INT          NOT NULL,
    NAME     VARCHAR(51)  NOT NULL,
    SURNAME  VARCHAR(51)  NOT NULL,
    EMAIL    VARCHAR(150) NOT NULL,
    PASSWORD VARCHAR(32)  NOT NULL,
    PRIMARY KEY (ID)
);

CREATE TABLE IF NOT EXISTS up_tasks_status
(
    ID    INT         NOT NULL AUTO_INCREMENT,
    TITLE VARCHAR(70) NOT NULL,
    PRIMARY KEY (ID)
);

CREATE TABLE IF NOT EXISTS up_tasks_priority
(
    ID    INT         NOT NULL AUTO_INCREMENT,
    TITLE VARCHAR(70) NOT NULL,
    PRIMARY KEY (ID)
);

CREATE TABLE IF NOT EXISTS up_tasks_task
(
    ID           INT          NOT NULL AUTO_INCREMENT,
    USER_ID      INT          NOT NULL,
    TITLE        VARCHAR(255) NOT NULL,
    DESCRIPTION  TEXT,
    CREATED_AT   DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
    UPDATED_AT   DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
    COMPLETED_AT DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIORITY_ID  INT          NOT NULL DEFAULT 1,
    STATUS_ID    INT          NOT NULL DEFAULT 1,
    PRIMARY KEY (ID),
    FOREIGN KEY (USER_ID) REFERENCES up_tasks_user (ID) ON DELETE CASCADE,
    FOREIGN KEY (PRIORITY_ID) REFERENCES up_tasks_priority (ID) ON DELETE RESTRICT,
    FOREIGN KEY (STATUS_ID) REFERENCES up_tasks_status (ID) ON DELETE RESTRICT
);

CREATE TABLE IF NOT EXISTS up_tasks_comment
(
    ID         INT      NOT NULL AUTO_INCREMENT,
    TASK_ID    INT      NOT NULL,
    CREATED_AT DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    UPDATED_AT DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    CONTENT    TEXT     NOT NULL,
    PRIMARY KEY (ID),
    FOREIGN KEY (TASK_ID) REFERENCES up_tasks_task (ID) ON DELETE CASCADE
);