<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Логотип Laravel"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Статус сборки"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Всего загрузок"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Последняя стабильная версия"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="Лицензия"></a>
</p>

## О API

Этот API на базе Laravel предоставляет функциональность для управления задачами. Вы можете создавать, читать, обновлять и удалять задачи.
## Установка

1.  Клонируйте репозиторий: `git clone https://github.com/msgcg/task-api.git`
2.  Перейдите в директорию проекта: `cd task-api`
3.  Установите зависимости: `composer install`
4.  Скопируйте файл `.env.example` в `.env`: `cp .env.example .env`
5.  Генерируйте ключ приложения: `php artisan key:generate`
6.  Настройте подключение к базе данных в файле `.env`
7.  Выполните миграции: `php artisan migrate`
8.  Запустите сервер: `php artisan serve`

## Конечные точки API

### Задачи

*   **GET /tasks**
    *   Описание: Получает список всех задач.
    *   Ответ:
        ```json
        [
          {
            "id": 1,
            "title": "Купить продукты",
            "description": "Молоко, Яйца, Хлеб",
            "is_completed": false,
            "created_at": "2023-10-27T10:00:00.000000Z",
            "updated_at": "2023-10-27T10:00:00.000000Z"
          }
        ]
        ```

*   **POST /tasks**
    *   Описание: Создает новую задачу.
    *   Тело запроса:
        ```json
        {
          "title": "Запланировать встречу",
          "description": "Обсудить прогресс по проекту"
        }
        ```
    *   Ответ:
        ```json
        {
          "id": 2,
          "title": "Запланировать встречу",
          "description": "Обсудить прогресс по проекту",
          "is_completed": false,
          "created_at": "2023-10-27T10:05:00.000000Z",
          "updated_at": "2023-10-27T10:05:00.000000Z"
        }
        ```

*   **GET /tasks/{id}**
    *   Описание: Получает определенную задачу по ее ID.
    *   Пример: `GET /tasks/1`
    *   Ответ:
        ```json
        {
          "id": 1,
          "title": "Купить продукты",
          "description": "Молоко, Яйца, Хлеб",
          "is_completed": false,
          "created_at": "2023-10-27T10:00:00.000000Z",
          "updated_at": "2023-10-27T10:00:00.000000Z"
        }
        ```

*   **PUT /tasks/{id}**
    *   Описание: Обновляет существующую задачу.
    *   Пример: `PUT /tasks/1`
    *   Тело запроса:
        ```json
        {
          "title": "Купить органические продукты",
          "description": "Органическое молоко, яйца от кур свободного выгула, цельнозерновой хлеб",
          "is_completed": true
        }
        ```
    *   Ответ:
        ```json
        {
          "id": 1,
          "title": "Купить органические продукты",
          "description": "Органическое молоко, яйца от кур свободного выгула, цельнозерновой хлеб",
          "is_completed": true,
          "created_at": "2023-10-27T10:00:00.000000Z",
          "updated_at": "2023-10-27T10:10:00.000000Z"
        }
        ```

*   **DELETE /tasks/{id}**
    *   Описание: Удаляет задачу.
    *   Пример: `DELETE /tasks/1`
    *   Ответ: `204 No Content`
