# HeroComputer

Premium corporate website for a technology company built with **Laravel 13** + **Vue 3** SPA.

## Tech Stack

- **Backend**: Laravel 13, PHP 8.x
- **Frontend**: Vue 3 (Composition API, `<script setup>`), Vue Router, vue-i18n
- **Database**: PostgreSQL
- **Build**: Vite 8
- **Styling**: Custom CSS (no frameworks), Montserrat typography
- **Notifications**: Telegram Bot API

## Features

- **6 public pages**: Home, About, Services, Cases (with detail pages), Developers, Contacts
- **3 languages**: Russian, English, Azerbaijani (vue-i18n)
- **Contact forms** with backend validation, DB storage, and Telegram webhook notifications
- **Developer application form** with separate submission flow
- **Admin panel** (`/admin`) with authentication:
  - Dashboard with statistics
  - CRUD for Services (multilingual)
  - CRUD for Case Studies (multilingual, colored cards)
  - CRUD for Dev Tasks (multilingual)
  - View/manage Contact Requests
  - View/manage Developer Applications
- **Dark premium design** with green accent (#1b5e3b)
- **Fade-up animations** via IntersectionObserver
- **Responsive layout** (mobile, tablet, desktop)
- **SPA routing** with page transitions

## Installation

### Requirements

- PHP 8.2+
- Composer
- Node.js 18+
- PostgreSQL

### Setup

```bash
# Clone the repository
git clone <repo-url>
cd herocomputer

# Install PHP dependencies
composer install

# Install JS dependencies
npm install

# Copy environment file
cp .env.example .env
php artisan key:generate

# Configure database in .env
# DB_CONNECTION=pgsql
# DB_HOST=127.0.0.1
# DB_PORT=5432
# DB_DATABASE=herocomputer
# DB_USERNAME=your_user
# DB_PASSWORD=your_password

# Create PostgreSQL database
sudo -u postgres psql -c "CREATE ROLE your_user WITH LOGIN CREATEDB PASSWORD 'your_password';"
sudo -u postgres psql -c "CREATE DATABASE herocomputer OWNER your_user;"

# Run migrations and seed admin user
php artisan migrate
php artisan db:seed
```

### Telegram Notifications (optional)

Add to `.env`:

```
TELEGRAM_BOT_TOKEN=your_bot_token
TELEGRAM_CHAT_ID=your_chat_id
```

To get these:
1. Create a bot via [@BotFather](https://t.me/BotFather) in Telegram
2. Get the bot token
3. Send any message to the bot, then visit `https://api.telegram.org/bot<TOKEN>/getUpdates` to find your chat_id

### Development

```bash
# Start Laravel server
php artisan serve

# Start Vite dev server (in separate terminal)
npm run dev
```

- Site: http://localhost:8000
- Admin: http://localhost:8000/admin

### Production Build

```bash
npm run build
```

## Admin Panel

- **URL**: `/admin`
- **Default credentials**: `admin@herocomputer.com` / `admin123`

### Sections:
| Section | Description |
|---------|-------------|
| Dashboard | Statistics overview, quick links |
| Services | CRUD with multilingual fields (RU/EN/AZ) |
| Cases | CRUD with colors, tech stack, categories |
| Dev Tasks | CRUD with stack and format |
| Contacts | View incoming project requests |
| Dev Applications | View developer applications |

## Project Structure

```
app/
  Http/Controllers/
    Admin/          # Admin panel controllers
    Api/            # API controllers (forms, data)
  Models/           # Eloquent models
database/
  migrations/       # DB schema
  seeders/          # Admin user seeder
resources/
  css/app.css       # Full stylesheet
  js/
    app.js          # Vue entry point
    router.js       # SPA routes
    App.vue         # Root component
    components/     # NavBar, FooterBlock, FadeUp
    pages/          # 7 page components
    i18n/           # Translation files (en, ru, az)
  views/
    app.blade.php   # Main Blade template
    admin/          # Admin Blade templates
routes/
  web.php           # SPA catch-all
  api.php           # API endpoints
  admin.php         # Admin routes
```

## API Endpoints

| Method | URL | Description |
|--------|-----|-------------|
| POST | `/api/contact/project` | Submit project inquiry |
| POST | `/api/contact/developer` | Submit developer application |
| GET | `/api/services` | Get active services |
| GET | `/api/cases` | Get active case studies |
| GET | `/api/dev-tasks` | Get active developer tasks |

## Database Schema

- **users** - Admin authentication
- **contact_requests** - Project inquiries (name, contact, message, type, read)
- **dev_applications** - Developer applications (name, telegram, stack, experience, portfolio, about)
- **services** - Company services (multilingual title/description, sort order, active)
- **case_studies** - Portfolio cases (multilingual, colors, tech, category)
- **dev_tasks** - Open developer positions (multilingual, stack, format)
