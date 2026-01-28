# Cara Push Project ke GitHub

## Langkah 1: Buka Terminal/Command Prompt

Buka Command Prompt atau PowerShell di folder project:
```
C:\laragon\www\e-ensiklopedia
```

## Langkah 2: Inisialisasi Git (Jika Belum)

```bash
git init
```

## Langkah 3: Tambahkan Remote Repository

```bash
git remote add origin https://github.com/rhmatzeka/BudayaMadura.git
```

Atau jika sudah ada remote, update:
```bash
git remote set-url origin https://github.com/rhmatzeka/BudayaMadura.git
```

## Langkah 4: Cek Status File

```bash
git status
```

## Langkah 5: Tambahkan Semua File

```bash
git add .
```

## Langkah 6: Commit Perubahan

```bash
git commit -m "Initial commit: E-Ensiklopedia Etnosains Madura"
```

## Langkah 7: Push ke GitHub

```bash
git branch -M main
git push -u origin main
```

Jika diminta username dan password:
- **Username**: rhmatzeka
- **Password**: Gunakan Personal Access Token (bukan password biasa)

### Cara Membuat Personal Access Token:

1. Buka GitHub → Settings → Developer settings
2. Personal access tokens → Tokens (classic)
3. Generate new token
4. Pilih scope: `repo` (full control)
5. Generate token
6. Copy token dan gunakan sebagai password

## Langkah 8: Verifikasi

Buka browser dan akses:
```
https://github.com/rhmatzeka/BudayaMadura
```

Pastikan semua file sudah terupload!

## 🔄 Update Project di Masa Depan

Setelah melakukan perubahan:

```bash
git add .
git commit -m "Deskripsi perubahan"
git push origin main
```

## ⚠️ Troubleshooting

### Error: "fatal: not a git repository"
```bash
git init
```

### Error: "remote origin already exists"
```bash
git remote remove origin
git remote add origin https://github.com/rhmatzeka/BudayaMadura.git
```

### Error: "failed to push some refs"
```bash
git pull origin main --allow-unrelated-histories
git push origin main
```

### Error: Authentication failed
- Gunakan Personal Access Token, bukan password
- Atau gunakan GitHub Desktop untuk login otomatis

## 📝 File yang TIDAK akan di-push (sudah ada di .gitignore):

- `/vendor` - Dependencies Composer
- `/node_modules` - Dependencies NPM
- `.env` - File konfigurasi (sensitive)
- `/storage/*.key` - Key files
- `composer.lock` - Lock file

## ✅ File yang AKAN di-push:

- Semua file source code (app, resources, routes, dll)
- `composer.json` - Daftar dependencies
- `database_lengkap_modul.sql` - Database schema dan data
- `README.md` - Dokumentasi
- `.gitignore` - Daftar file yang diabaikan
- File panduan (CARA_*.md)

## 🎉 Selesai!

Project Anda sekarang sudah ada di GitHub dan bisa diakses oleh siapa saja!