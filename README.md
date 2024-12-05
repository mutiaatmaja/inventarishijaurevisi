langkahnya untukke lokal

<h3>
<ol>
    <li>Clone dulu lewat terminal</li>
    <li>lalu ketik cd <i>nama folder hasil clone</i></li>
    <li>lalu cp .env.example .env</li>
    <li>sesuaikan envnya database terutama</li>
    <li>lalu composer install</li>
    <li>lalu php artisan key:generate</li>
    <li>php artisan migrate:fresh --seed</li>
    <li>untuk login cek aja di file DatabaseSeeder</li>
</ol>
</h3>