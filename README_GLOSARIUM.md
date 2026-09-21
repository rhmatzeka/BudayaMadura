# Glossary Feature

How the glossary works in the e-encyclopedia.

## What it does

- The glossary is **page 9** of the table of contents: Home → Table of contents → Glossary.
- Every term has **its own page** at `/glossarium/{id}`.
- Each term page has three buttons: **Previous** term, back to the **table of contents**, and **Next** term.
- A **glossary widget** above the footer shows six terms on every page, with a "See all" button.

## Navigation

```
Home
  ↓
Navbar: [Home] [Table of contents] [Cultural products] [Gallery]
  ↓
Table of contents (9 pages)
  ↓
Glossary (page 9)
  ↓
Term 1  [← Previous] [Table of contents] [Next →]
  ↓
Term 2  [← Previous] [Table of contents] [Next →]
  ...
```

## Files involved

| File | Role |
| --- | --- |
| `app/Http/Controllers/GlosariumController.php` | Lists terms and shows one term with its previous/next links |
| `resources/views/glossarium/show.blade.php` | Term detail page |
| `resources/views/modul/pages/glosarium.blade.php` | Glossary entry in the module that redirects to the first term |
| `resources/views/layouts/app.blade.php` | Navbar and the footer glossary widget |
| `routes/web.php` | `/glossarium` and `/glossarium/{id}` routes |

## Data

Terms live in the `glossarium` table (`istilah` = term, `arti_istilah` = meaning, `penjelasan_lengkap` = full explanation, `kategori` = category). The glossary page itself is a row in `halaman_modul`.

## Troubleshooting

| Problem | Fix |
| --- | --- |
| "Target class [GlosariumController] does not exist" | Run `composer dump-autoload`. |
| The glossary is missing from the table of contents | Re-import `database_lengkap_modul.sql` so `halaman_modul` has all 9 pages. |
| Blank page after clicking the glossary | Make sure the `glossarium` table has data. |
| The widget doesn't show up | Hard-refresh the browser (Ctrl+F5). |
