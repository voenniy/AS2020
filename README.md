# AtomSkills 2020. IT Solution for business

## Состав репозитария

Кучумов Олег Юрьевич

web Решение и руководство пользователя находится в папке solution
Desktop решение по адресу https://yadi.sk/d/gonlnV8tjmgAo

Для запуска необходима база данных postgres c парамертрами
HOST 127.0.0.1
PORT 5432
user postgres
password gfhjkbr13
database as2020_app



Web решение сделанно на языке php
Необходимо всю папку с web решением положить в openserver и внутри этой папки выполнить команду в коносли

`php artisan migrate` 

Эта команда запустит все миграции в базу
после этого запустить сервер

`php artisan serve`

Далее переходим по адресу http://127.0.0.1:8000 - тут будет рабочее web приложение

Для запуска Desktop приложения надо скачать и раскаковать архив и запусть файл atom.exe