# Madura Ethnoscience E-Encyclopedia

A learning website for grade 5 elementary school students that teaches science through the local culture of **Madura**, an island in East Java, Indonesia. Students explore traditional Madurese products, such as batik and petis, and learn the science behind how they are made.

The site content is in Indonesian, because it is written for Indonesian students.

## Features

- **Learning module** with guided pages: cover, author info, goals, target users, highlights, how to use, an introduction to ethnoscience, and the product list
- **Cultural products**: Madura batik, petis (fermented shrimp paste), rengginang lorjuk (razor clam crackers), and terasi (shrimp paste), each with photos, videos, and the science behind them
- **Glossary** of cultural and science terms, with next/previous buttons for each term
- **Photo gallery**
- **Back / Next buttons** on every page, so it reads like a book
- Works on phones and laptops

## Who it's for

- **Students**: grade 5 elementary school (SD/MI)
- **Teachers**: reference material for science and social studies (IPAS)
- **Researchers and the public**: documentation of Madurese ethnoscience

## Tech stack

Laravel 10, PHP 8.1+, MySQL, Bootstrap 5, Font Awesome

## Getting started

You need PHP 8.1+, Composer, and MySQL 5.7+. On Windows, [Laragon](https://laragon.org) is the easiest option.

1. Install dependencies:

   ```bash
   composer install
   ```

2. Create your environment file and app key:

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

3. Set the database in `.env`:

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=e_ensiklopedia
   DB_USERNAME=root
   DB_PASSWORD=
   ```

4. Create the `e_ensiklopedia` database and import the content:

   ```bash
   mysql -u root -p e_ensiklopedia < database_lengkap_modul.sql
   ```

5. Start the server and open http://localhost:8000:

   ```bash
   php artisan serve
   ```

For a Windows + Laragon setup with a nice local domain, see [README_SETUP.md](README_SETUP.md).

## Main pages

| URL | Page |
| --- | --- |
| `/` | Cover page |
| `/modul` | Table of contents |
| `/produk` | Cultural products (with search, categories, and gallery) |
| `/glossarium` | Glossary |
| `/tentang` | About: goals, target users, highlights, how to use |

## Database tables

| Table | What it holds |
| --- | --- |
| `halaman_modul` | Module pages |
| `produk` | Cultural products |
| `gambar`, `video` | Product photos and videos |
| `glossarium` | Glossary terms |
| `nilai_budaya`, `produk_nilai_budaya` | Cultural values and which products they belong to |

## Credits

- **Content author**: Leli Lestari
- **Developer**: [@rhmatzeka](https://github.com/rhmatzeka)

Made for education and research.
