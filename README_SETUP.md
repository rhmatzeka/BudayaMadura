# Windows Setup with Laragon

This guide runs the site on Windows at a friendly local address, **http://e-ensiklopedia.test**, using [Laragon](https://laragon.org). For the quick cross-platform setup, see the main [README](README.md).

## 1. Copy the project into Laragon

Run `copy-to-laragon.bat`, or copy the folder by hand to `C:\laragon\www\e-ensiklopedia`.

## 2. Add a virtual host

In Laragon, open **Menu → Tools → Apache Conf** and add this at the end:

```apache
<VirtualHost *:80>
    ServerName e-ensiklopedia.test
    DocumentRoot "C:/laragon/www/e-ensiklopedia/public"
    <Directory "C:/laragon/www/e-ensiklopedia/public">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

Save, then stop and start Apache.

## 3. Point the domain to your computer

Open Notepad **as Administrator**, open `C:\Windows\System32\drivers\etc\hosts`, and add:

```
127.0.0.1   e-ensiklopedia.test
```

## 4. Create the database

Open Laragon's **Database** tool (HeidiSQL), create a database called `e_ensiklopedia`, then use **File → Load SQL file** to run `database_lengkap_modul.sql`.

## 5. Update `.env`

```env
APP_URL=http://e-ensiklopedia.test
DB_DATABASE=e_ensiklopedia
DB_USERNAME=root
DB_PASSWORD=
```

## 6. Open the site

Go to http://e-ensiklopedia.test.

| Page | Address |
| --- | --- |
| Home | `/` |
| Products | `/produk` |
| Photo gallery | `/produk/galeri` |
| Glossary | `/glossarium` |
| Product search | `/produk/search?q=petis` |

## Troubleshooting

| Problem | Fix |
| --- | --- |
| "Connection refused" | In Laragon, click **Start All** and wait until everything is green. |
| `e-ensiklopedia.test` doesn't open | Check the `hosts` file, restart the browser, and run `ipconfig /flushdns` in an admin terminal. |
| "No such file or directory" | Make sure the project is in `C:\laragon\www\e-ensiklopedia` and has a `public` folder, then restart Apache. |
| Images are missing | Put product images in `public/images/produk/` with the file names used in the database (for example `petis-1.jpg`). |
