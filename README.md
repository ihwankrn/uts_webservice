# UTS Pem Web

Project Laravel untuk UTS Pemrograman Web.

## Identitas Tim

- Master (Front-End): Ihwan Kurniawan (24010110164)
- Pegawai (Back-End): Zelly Marliaty (24010110161)

## Menjalankan Project

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
php artisan serve
```
