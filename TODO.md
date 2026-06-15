# TODO (CNIC document admin panel not showing)

- [x] Update `admin/student-view.blade.php` to show CNIC document using `cnic_document` column.
- [x] Fix `create_student_applications_table` migration `up()` to create required columns including `cnic_document`.
- [x] Ensure `StudentApplication` model fillable includes `cnic_document`.
- [ ] Run migrations (and fix existing DB rows if needed).
- [x] Run `php artisan storage:link` so uploaded files are accessible via `/storage/...` (already existed).
- [ ] Submit a test application and verify admin panel link opens file.

