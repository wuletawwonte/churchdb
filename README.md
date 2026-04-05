# ChurchDB

ChurchDB is a **public, open source** web application for managing people, groups, and related records for faith communities and similar organizations. It is **not limited to a single congregation or denomination**: you can adapt labels, configuration, and data to your own context.

The project is **built with Ethiopian churches in mind**—including **Amharic** in the interface, workflows that match common local church administration needs, and defaults that fit how many congregations in Ethiopia operate. Contributors and deployers anywhere are welcome; the stack is standard PHP and MySQL.

## Features (high level)

- Member registration and profiles, groups, payments, notes, and reporting-oriented views  
- Bilingual-friendly UI (Amharic-focused strings with English fallbacks where configured)  
- CodeIgniter 4 application structure (`public/` document root, `.env` configuration)

## Requirements

- **PHP** 8.2+ with extensions such as **intl**, **mbstring**, and **mysqli** / **mysqlnd** (see the [CodeIgniter 4 user guide](https://codeigniter.com/user_guide/) for full details)  
- **MySQL** or **MariaDB** for the application database  
- **Composer** for PHP dependencies  

## Quick start (local)

1. Clone the repository and install dependencies:

   ```bash
   composer install
   ```

2. Copy the environment template and edit database and `app.baseURL` (and other values as needed):

   ```bash
   cp env .env
   ```

3. Create the database and import schema (and optional seed data):

   ```bash
   mysql -u USER -p DATABASE < database/schema.sql
   mysql -u USER -p DATABASE < database/seed.sql   # optional demo data
   ```

4. Point your web server at the **`public/`** directory (not the project root), or use Docker (see below).

## Docker

A **`Dockerfile`** and **`docker-compose.yml`** are included for local stacks (app + MariaDB). See the comments in `docker-compose.yml` for ports, environment variables, and how to load `database/schema.sql` after the containers are up.

Images are also built in CI and can be published to **GitHub Container Registry**; see `.github/workflows/docker-ghcr.yml`.

## Framework

ChurchDB is built on [CodeIgniter 4](https://codeigniter.com). For framework-specific concepts (routing, security, localization), refer to the [official documentation](https://codeigniter.com/user_guide/).

## License

This project is open source under the **MIT License**; see the `LICENSE` file in the repository.

## Contributing

Issues and pull requests are welcome. Please keep changes focused and consistent with existing patterns in the codebase.
