CREATE TABLE IF NOT EXISTS up_tasks_user_role
(
    ID   INT          NOT NULL AUTO_INCREMENT,
    ROLE VARCHAR(255) NOT NULL,
    PRIMARY KEY (ID)
);

CREATE TABLE IF NOT EXISTS up_tasks_user
(
    ID       INT          NOT NULL AUTO_INCREMENT,
    ROLE_ID  INT          NOT NULL,
    NAME     VARCHAR(51)  NOT NULL,
    SURNAME  VARCHAR(51)  NOT NULL,
    EMAIL    VARCHAR(150) NOT NULL,
    PASSWORD VARCHAR(32)  NOT NULL,
    PRIMARY KEY (ID),
    FOREIGN KEY (ROLE_ID) REFERENCES up_tasks_user_role (ID) ON DELETE RESTRICT
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

INSERT INTO up_tasks_user_role
VALUES
    (1, 'Разработчик'),
    (2, 'Администратор'),
    (3, 'Руководитель'),
    (4, 'Тестироващик'),
    (5, 'Дизайнер');

INSERT INTO up_tasks_priority
VALUES
    (1, 'Низкая'),
    (2, 'Средняя'),
    (3, 'Высокая');

INSERT INTO up_tasks_status
VALUES
    (1, 'Новая'),
    (2, 'Выполняется'),
    (3, 'На проверке'),
    (4, 'Выполнена'),
    (5, 'Отменена');

INSERT INTO up_tasks_user
VALUES
    (1, 1, 'Юлия', 'Гаус', 'pesosssss@yandex.ru', 'super_secret_password_qwerty123'),
    (2, 1, 'Юлия', 'Робертс', 'pes@yandex.ru', 'super_secret_password_qwerty123'),
    (3, 1, 'Админ', 'Админов', 'admin@gmail.com', 'super_secret_password_qwerty123');

INSERT INTO up_tasks_task (ID, USER_ID, TITLE, DESCRIPTION, PRIORITY_ID, STATUS_ID, DEADLINE)
VALUES
    (1, 1, 'THE TITTLEST OF THE TITTLE', 'Возможно это самое важное описание в вашей жизни, а возможно нет. Я просто не знаю, что сюда вписать и не понимаю, как автоматически делать прикольные вставки для заполнения таблицы. Может, это и будет следующая идея для проекта, пока не знаю, посмотрим :). Спасибо, что дочитали это описание до конца, хорошего вам дня/вечера/утра', 1, 1, CURRENT_TIMESTAMP),
    (2, 2, 'THE TITTLEST OF THE TITTLE', 'Возможно это самое важное описание в вашей жизни, а возможно нет. Я просто не знаю, что сюда вписать и не понимаю, как автоматически делать прикольные вставки для заполнения таблицы. Может, это и будет следующая идея для проекта, пока не знаю, посмотрим :). Спасибо, что дочитали это описание до конца, хорошего вам дня/вечера/утра', 2, 2, CURRENT_TIMESTAMP),
    (3, 3, 'THE TITTLEST OF THE TITTLE', 'Возможно это самое важное описание в вашей жизни, а возможно нет. Спасибо, что дочитали это описание до конца, хорошего вам дня/вечера/утра', 1, 1, CURRENT_TIMESTAMP);

ALTER TABLE up_tasks_task
    ADD DEADLINE DATETIME;