## Media Pembayaran Indonesia

<p>Konfigurasi Aplikasi<p>
<ol>
    <li>clone Aplikasi Program pada local komputer dengan menggunakan "git clone"</li>
    <li>Copy File env.example lalu ubah nama nya dengan .env</li>
    <li>
        setting terlebih dahulu env (seperti: Database dan Informasi APP sesuai dengan local komputer masing-masing)
        **note** : Untuk APP_URL dan setting MIDTRANS wajib diisi
    </li>
    <li>
        setelah itu "composer install" dan jalankan "composer dump-autoload"
    </li>
    <li>
        setelah composer install selesai jalankan beberapa perintah berikut:
        <br />
        1. "php artisan migrate:fresh" <br />
        2. "php artisan db:seed --class DatabaseSeeder" <br />
        3. "php artisan cache:clear" <br />
        4. "php artisan view:clear" <br />
        5. "php artisan config:cache" <br />
        6. "php artisan config:clear" <br />
   </li>
<ol>
    
## Link EMBED ANALISIS DESIGN
https://drawsql.app/teams/tamca/diagrams/mpi-test
