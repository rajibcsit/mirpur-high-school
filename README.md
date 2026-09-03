# Mirpur High School — Laravel Website + Admin Dashboard

A full dynamic school website built with **Laravel 11**, **Blade**, and **Tailwind CSS v4**, including a complete admin dashboard for content management.

## ✨ Features

### Public Website
- Home page with hero, notices, upcoming events, teachers preview, gallery preview
- About Us, Academics pages
- Notice board (list + detail view, downloadable attachments)
- Teachers directory
- Photo gallery
- Online Admission application form
- Contact form
- Fully responsive with Tailwind CSS

### Admin Dashboard (`/admin`)
- Secure login (Laravel session auth)
- Dashboard with stats overview
- **Notices**: create/edit/delete, publish/draft, file attachments
- **Events**: create/edit/delete with cover images
- **Gallery**: upload/delete images by category
- **Teachers**: manage staff profiles with photos
- **Admissions**: view applications, update status (pending/approved/rejected)
- **Contact Messages**: view and manage inquiries

## 🛠️ Setup Instructions

> This project ships as the **application layer** of a Laravel app (models, controllers, migrations, views, routes). Since Laravel's core framework (`vendor/`) must come from Composer, follow these steps to assemble a runnable project:

### 1. Create a fresh Laravel 11 project
```bash
composer create-project laravel/laravel mirpur-high-school
cd mirpur-high-school
```

### 2. Copy in the provided application files
Copy these folders/files from this package **into** your new Laravel project, overwriting where needed:
```
app/Models/
app/Http/Controllers/
app/Http/Middleware/
database/migrations/
database/seeders/DatabaseSeeder.php
routes/web.php
routes/console.php
bootstrap/app.php
resources/views/
resources/css/app.css
resources/js/app.js
vite.config.js
package.json
```

### 3. Install dependencies
```bash
composer install
npm install
```

### 4. Configure environment
```bash
cp .env.example .env
php artisan key:generate
```
Edit `.env` and set your database credentials (MySQL recommended).

### 5. Run migrations & seed sample data
```bash
php artisan migrate --seed
```
This creates a default admin account:
- **Email:** admin@mirpurhighschool.edu
- **Password:** password123

**⚠️ Change this password immediately after first login (via `php artisan tinker` or add a "change password" feature).**

### 6. Link storage (for uploaded images/files)
```bash
php artisan storage:link
```

### 7. Build frontend assets
```bash
npm run dev      # development
# or
npm run build    # production
```

### 8. Serve the app
```bash
php artisan serve
```
Visit:
- Website: http://localhost:8000
- Admin Login: http://localhost:8000/login

## 📁 Key Routes

| Route | Description |
|---|---|
| `/` | Homepage |
| `/about` | About page |
| `/academics` | Academics page |
| `/notices` | Notice board |
| `/gallery` | Photo gallery |
| `/teachers` | Teachers directory |
| `/admission` | Admission application form |
| `/contact` | Contact form |
| `/login` | Admin login |
| `/admin/dashboard` | Admin dashboard (auth required) |

## 🎨 Customization
- School name, colors (`--color-primary`, `--color-gold`), and contact info can be edited in `resources/views/layouts/app.blade.php` and `resources/css/app.css`.
- Replace the "MHS" logo placeholder with your actual school logo image inside the header/footer.
- Update `.env` with real SMTP credentials to enable email notifications on new admissions/messages (not yet wired to Mail — currently stored in DB only).

## 🔒 Security Notes
- Only users with `role = admin` in the `users` table can access `/admin/*` routes (enforced by `IsAdmin` middleware).
- To add more admin/editor accounts, use `php artisan tinker`:
```php
App\Models\User::create([
    'name' => 'New Admin',
    'email' => 'newadmin@mirpurhighschool.edu',
    'password' => bcrypt('a-strong-password'),
    'role' => 'admin',
]);
```

## 📦 Tech Stack
- Laravel 11
- Blade templating
- Tailwind CSS v4 (via `@tailwindcss/vite`)
- MySQL (or any DB Laravel supports)
- Vite for asset bundling
