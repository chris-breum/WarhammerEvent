# Deployment til cPanel (Undermappe)

## Upload instruktioner

### 1. Upload alle filer
Upload **hele projektmappen** til: `public_html/starup-uif/`

### 2. Tjek mappestruktur
Efter upload skal strukturen være:
```
public_html/
  └── starup-uif/
      ├── .htaccess (redirecter til public/)
      ├── app/
      ├── bootstrap/
      ├── config/
      ├── database/
      ├── public/
      │   ├── .htaccess (Laravel rewrite rules)
      │   ├── index.php
      │   └── ...
      ├── resources/
      ├── routes/
      ├── storage/
      ├── vendor/
      ├── .env
      └── ...
```

### 3. Rettigheder (via cPanel File Manager eller SSH)
```bash
chmod -R 755 storage
chmod -R 755 bootstrap/cache
```

### 4. Database (allerede konfigureret)
Databasen er sat op i .env:
- **Database:** chris36517_starup-uifDB
- **Bruger:** chris36517
- **Host:** localhost

### 5. Kør migrations (via SSH eller Terminal i cPanel)
```bash
cd public_html/starup-uif
php artisan migrate --force
```

### 6. Optimer (via SSH)
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## URL
Dit projekt vil være tilgængeligt på:
**https://chris36517.aspitcloud.dk/starup-uif**

## Vigtige filer der er opdateret
- ✅ `.htaccess` i roden (redirecter til public/)
- ✅ `.env` - APP_URL sat til: `https://chris36517.aspitcloud.dk/starup-uif`

## Fejlsøgning

### Hvis du får 500 error:
1. Tjek at storage/ og bootstrap/cache/ har korrekte rettigheder
2. Tjek error log i cPanel

### Hvis CSS/JS ikke indlæses:
Kør: `php artisan storage:link`

### Hvis du får "Application key not set":
Kør: `php artisan key:generate`
