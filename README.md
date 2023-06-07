# Installation Guide

## Requirements

[php](https://www.php.net/downloads.php) v8.2.4+

[Laravel](https://laravel.com/docs) v10.11.0+

[composer](https://getcomposer.org/) v2.5.5


## Installation

### 1. Install Composer Dependencies

If you have composer installed locally, you can run:

```bash
composer  install  --ignore-platform-reqs
```

### 2. Environment variables .env

In project directory make copy of .env.example file and rename it to .env or simply use command:
```bash
cp .env.example  .env
```

To use redis as queue connection you will need phpredis extention. If you are using sail it will automaticaly be enabled. For more details visit [laravel documentation](https://laravel.com/docs/10.x/redis)

### 4. Migrating and Seeding Database

To migrate tables inside database and seed testing data, you can simply run.

```bash
php artisan  migrate  --seed
```

**Note: to migrate new migrations to  databases you will need to use following command**

```bash
php artisan migrate
```

# Install Prettier extension on VSCode

1. [Install Prettier](https://marketplace.visualstudio.com/items?itemName=esbenp.prettier-vscode) extension

# Laravel Pint

1. We have installed Laravel Pint inside the project for maintaining code readability. To use Laravel Pint simply run following command:

    ```bash
    ./vendor/bin/pint
    ```

    You can see more information inside [Laravel Pint](https://github.com/laravel/pint) GitHub page.
