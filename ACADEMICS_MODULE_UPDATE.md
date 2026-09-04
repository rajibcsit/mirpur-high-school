# Academics Module Update

This update fixes the existing Academics module using the project's current Laravel structure.

## Fixed
- `/academics` now receives real database data instead of undefined `$classes`, `$subjects`, and `$programs`.
- Active/inactive records are respected.
- Dynamic categories: class, subject, program, facility.
- Public category filter: `/academics?category=class`.
- Admin search, category filter and status filter.
- Display ordering.
- Improved validation.
- Admin sidebar Academics link.
- New database index for active/category/order queries.

## Run
```bash
php artisan migrate
php artisan optimize:clear
npm run build
php artisan serve
```

## Existing data
The existing `academics` table and records are preserved. The new index migration does not delete data.

## Admin
Open:
`/admin/academics`

Add records with one of:
- Class
- Subject
- Program
- Facility

Set `Show on website` to control public visibility.
