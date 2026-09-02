# Mirpur ML High School — Laravel 12 Feature Update

This update adds:
- Homepage hero slider with admin CRUD and automatic 6-second rotation.
- Public Student Result Portal at `/results`.
- Admin student management.
- Admin result entry and deletion.
- Public Class Routine at `/routine`.
- Admin class routine management.
- New dashboard statistics.
- New frontend navigation links.
- Laravel 12 middleware alias for `is_admin`.

## Installation

Copy/merge the files from this update into your existing Laravel project.

Then run:

```bash
php artisan optimize:clear
php artisan migrate
php artisan storage:link
npm install
npm run build
php artisan serve
```

If this is a fresh database and you want demo data:

```bash
php artisan migrate:fresh --seed
```

Demo result search:
- Student ID: `MHS-1001`
- Roll: `1`
- Academic Year: `2026`
- Exam: `Annual Examination`

## URLs

- `/` — Homepage + hero slider
- `/results` — Student Result Portal
- `/routine` — Class Routine
- `/admin/sliders` — Manage hero slides
- `/admin/students` — Manage students
- `/admin/results` — Manage results
- `/admin/routines` — Manage routines

## Important

Your `User` model already uses a `role` field (`admin | editor`) and `isAdmin()`, so the existing `IsAdmin` middleware is compatible.

The slider supports either uploaded images or a gradient fallback. Button URLs can be internal paths such as `/admission` or `/results`.
