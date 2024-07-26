# Тестовое задание для Лаборатории Интернет.

При выполнении использовался фреймворк Yii 2 (задание №3). Настроен .htaccess для запуска сайта сразу же на домене. Включены ЧПУрлы. Все методы выведены на главной странице, в шапке осталась регистрация и вход (выход). Прописаны правила и валидация.

1. Создан репозиторий (соответственно это он и есть)
2. Реализовал методы REST API (подключил доступ JSON запросов к методу, создал контроллер - UsersController.php и модель - Users.php)
3. Создание пользователя, обновление информации, авторизация, получение данных и удаление реализованы через взаимодействие модели и контроллера (MVC).
Создание пользователя происходи через метод actionCreate в контроллере, данный метод создает новый класс из модели Users. После регистрации идет редирект на главную страницу. Также реализовал клинт-серверное решение на странице http://internetlabtest/web/users/create/. Используется та же модель и контроллер (поля - ).
Обновлении информации идет через метод actionUpdate (в контроллере), который принимает ID и в случае Post запроса изменяет данные. После обновления данных идет редирект на ту же самую ссылку.
Авторизация происходит уже в модели, с использованием IdentityInterface, чтобы проходить авторизацию средствами yii2. Вся авторизация происходит путем проверки пароля и нахождения логина в БД. Также есть клиент-серверное решение - на странице http://internetlabtest/web/site/login (поля для входа - логин, пароль).
Получение данных происходит через метод actionView - берет View для страницы users и выводит их на странице по заготовленной верстке. За основу берется ID. Можно посмотреть на клиент-серверной части на странице http://internetlabtest/web/users.
Удаление происходит через метод actionDelete. Идет запрос с ID пользователя, далее удаляется при нахождении. Работает на клиент-серверной части - на странице с отдельным юзером - кнопка "delete".