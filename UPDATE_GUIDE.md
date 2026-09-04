# Mirpur ML High School - UI & CMS Update

## Added
- Premium animated hero section with Ken Burns effect, glass CTA buttons and navigation.
- Dynamic latest-news ticker (uses News module; falls back to Notices).
- New Latest News CMS: `/admin/news` with image, category, excerpt, content, publish/draft, featured and external URL.
- Public News listing/detail pages: `/news`.
- Results portal redesign with performance summary, percentage, GPA and print-ready result.
- Routine redesign with class/year/section filters, weekly day cards and print schedule.
- Scroll reveal animations, hover motion, responsive cards, modern typography and campus gallery presentation.

## Deploy
```bash
php artisan migrate
php artisan storage:link
npm install
npm run build
```

If your server uses MySQL, ensure PHP has the PDO MySQL extension enabled before running migrations.
