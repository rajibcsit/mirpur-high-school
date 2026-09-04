# Mirpur High School Website — UI & CMS Update

This package is an updated Laravel 12 school website based on the original project.

## Main updates
- Modern responsive homepage UI with a redesigned hero, quick-access cards, statistics, notices, principal message, teachers, gallery, events and admission CTA.
- Dynamic About Page content managed from **Admin → About Page**.
- Dynamic About image and Principal photo uploads.
- Dynamic Mission, Vision, school history and intro content.
- Dynamic homepage statistics: students, teachers, years of excellence and achievements.
- Improved public navbar, mobile menu, footer, cards, typography and spacing.
- Existing modules remain available: sliders, students, results, routines, notices, events, gallery, teachers, admissions, messages and settings.
- Added protected admin routes for About content.

## After uploading/deploying
1. Configure `.env` for your server/database.
2. Run `php artisan migrate` to add the new About fields.
3. Run `php artisan storage:link` if the storage symlink does not exist.
4. Install frontend dependencies with `npm install`.
5. Run `npm run build` for a fresh production asset build.

## New admin URL
`/admin/about`

The existing database content is not intentionally replaced by this update.
