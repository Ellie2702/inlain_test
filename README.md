## ТЕСТОВОЕ ЗАДАНИЕ ДЛЯ "ИНЛАЙН"
---

* Скрипт для скачивания записей постов и комментариев находдится в `php/download_blog_list.php`.
_Загрузить записи так же можно нажав на кнопку "загрузить записи постов и комментариев"_

* Скрипт для создания базы находится в `Query.sql`

* Для запуска скрипта `download_blog_list.php` в Windows из-под OpenServer может понадобиться подключить дополнительные модули. Пример команды (выполняется в папке `php/`):
`C:\OpenServer\modules\php\PHP_8.0\php.exe -d extension="C:\OpenServer\modules\php\PHP_8.0\ext\php_mysqli.dll" -d extension="C:\OpenServer\modules\php\PHP_8.0\ext\php_openssl.dll" .\download_blog_list.php` где вместо `C:\OpenServer\modules\php\PHP_8.0\` Ваш путь к папке с PHP в OpenServer.