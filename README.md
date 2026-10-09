# Taskly

Taskly is a small Tasks for Today management system built with PHP and CodeIgniter 4. It includes a Today dashboard, complete task list, demo profile, and About page.

## Requirements

- PHP 8.2+
- MySQL or MariaDB
- Composer

## Local setup

1. Install dependencies:

   ```bash
   composer install
   ```

2. Copy `env` to `.env` and set `app.baseURL` plus the `database.default.*` values for your database.

3. Create the tables and demo data:

   ```bash
   php spark migrate
   php spark db:seed DemoSeeder
   ```

   The seed creates eight tasks across yesterday, today, and tomorrow, plus exactly one demo user.

4. Start the local server:

   ```bash
   php spark serve
   ```

Visit `/`, `/tasks`, `/profile`, or `/about`.

## InfinityFree deployment

Upload the project files, point the domain or subdomain document root to the `public` directory, and configure the database values in `.env` with the MySQL credentials provided by InfinityFree. Run the migration and seeder once from a local environment connected to the hosting database, or use the hosting terminal if it is available.

Keep `writable` writable by PHP. Do not commit `.env` because it contains database credentials.

## Project structure

- `app/Controllers` — page controllers
- `app/Models` — `TaskModel` and `UserModel`
- `app/Database/Migrations` — database schema
- `app/Database/Seeds` — demo records
- `app/Views` — shared layout and page views
