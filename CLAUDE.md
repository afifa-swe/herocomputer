# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## О проекте

HeroComputer — корпоративный сайт технологической компании. SPA-фронтенд на Vue 3 + серверная часть и админ-панель на Laravel 13. База данных — PostgreSQL. Деплой на Render через Docker.

## Команды разработки

```bash
# Запуск всего окружения (сервер + очередь + логи + Vite) одной командой:
composer dev

# Или по отдельности:
php artisan serve          # Laravel-сервер на :8000
npm run dev                # Vite dev-сервер с HMR

# Сборка фронтенда для продакшена:
npm run build

# Тесты:
composer test              # все тесты (очищает конфиг + artisan test)
php artisan test --filter=НазваниеТеста   # один тест

# Линтинг PHP (Pint):
./vendor/bin/pint

# Миграции:
php artisan migrate
php artisan db:seed        # создаёт admin-пользователя
```

## Архитектура

### Два независимых слоя UI

- **Публичный сайт** — Vue 3 SPA (Composition API, `<script setup>`). Точка входа: `resources/js/app.js` → `App.vue` → `router.js`. Маршруты SPA ловятся catch-all в `routes/web.php` (`/{any?}` кроме `/admin` и `/api`).
- **Админ-панель** — серверный Blade (`resources/views/admin/`). Маршруты в `routes/admin.php`, защищены middleware `auth`. URL: `/admin`.

Эти два слоя не пересекаются: Vue не рендерит админку, Blade не рендерит публичный сайт.

### API (routes/api.php)

Два контроллера:
- `Api\DataController` — GET-эндпоинты для получения сервисов, кейсов, задач
- `Api\ContactController` — POST-эндпоинты для отправки форм (проект / разработчик). При отправке формы идёт уведомление в Telegram (если настроены `TELEGRAM_BOT_TOKEN` / `TELEGRAM_CHAT_ID` в `.env`).

### Многоязычность

Фронтенд: `vue-i18n`, файлы переводов в `resources/js/i18n/` (ru, en, az).
Модели (Service, CaseStudy, DevTask): мультиязычные поля хранятся отдельными колонками (`title_ru`, `title_en`, `title_az`).

### Стилизация

Единый CSS-файл `resources/css/app.css` без CSS-фреймворков. Тёмная тема, акцентный цвет — `#1b5e3b`. Шрифт — Montserrat.

### Тесты

PHPUnit. В тестах используется SQLite in-memory (`phpunit.xml`). Тест-сьюты: `tests/Unit` и `tests/Feature`.

### Деплой

Docker-образ на базе `php:8.4-cli`. Конфигурация Render — `render.yaml`. Стартовый скрипт — `docker/start.sh`. Порт — 10000.

### Алиасы Vite

`@` → `resources/js/` (настроено в `vite.config.js`).
