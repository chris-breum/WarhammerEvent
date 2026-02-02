# Kommandoer til cPanel Terminal

Kør disse kommandoer i cPanel's terminal for at rydde alle caches:

```bash
# 1. Naviger til projektmappen
cd ~/public_html/warhammer
# eller
cd ~/domains/ditdomæne.dk/public_html/warhammer

# 2. Ryd Laravel caches
php artisan route:clear
php artisan config:clear
php artisan view:clear

# 3. Ryd OPcache (hvis tilgængelig)
php artisan opcache:clear
# eller
php -r "opcache_reset();"

# 4. Genindlæs composer autoload
composer dump-autoload

# 5. Generer nye routes (valgfrit)
php artisan route:cache
php artisan config:cache
```

## Hvis fejlen fortsætter:

Kontroller at:
1. `.htaccess` filen er korrekt i public mappen
2. Alle filer er uploadet korrekt
3. Web serveren (Apache/LiteSpeed) er genstartet

## Alternativ løsning:

Hvis du har adgang til cPanel File Manager:
1. Slet hele `bootstrap/cache` mappen
2. Opret den igen (tom)
3. Kør `php artisan config:cache` igen
