# Scraping berita pada website selma UB 🕵️‍

Scraping berita yang terdapat pada website selma UB.
Kategori yang diambil untuk saat ini hanyalah **Berita**.
Berikut adalah url untuk berita pada [Selma UB](https://selma.ub.ac.id/category/).

## Penggunaan 👨‍💻
Cara penggunaan cukup mudah, silahkan clone atau download dalam format **.zip**.
kemudian anda bisa menjalankan dengan 2 cara :

1. Pada terminal (cmd) atau console. yaitu dengan perintah `php index.php`, maka akan menampilkan data berita dengan format array.
2. Pada **POSTMAN** dengan format output berupa JSON. yaitu dengan cara membuka command line (cmd), kemudian masuk pada direktori **news-selma-ub** dan jalankan perintah `php -S localhost:8000 -t .` , kemudian buka POSTMAN dan masukan url seperti berikut :
    * `localhost:8000/api.php?category={category}`. **{category}** adalah parameter yang digunakan untuk menampilkan daftar informasi berdasarkan category. contoh jika ingin mendapatkan category berita maka url yang digunakan adalah `localhost:8000/api.php?category=Berita`.
    * `localhost:8000/api.php?category={category}&page={num}`. **{num}** adalah parameter berupa **number [0-9]** yang digunakan untuk menampilkan daftar infromasi berdasarkan page/halaman pada category tertentu. contoh penggunaan url jika ingin mendapatkan berita pada page/halaman tertentu adalah `localhost:8000/api.php?category=Berita&page=2`. secara *default* page 1 akan mengarah kepada halaman category jadi tidak ada untuk parameter **page=1**.

## Kontribusi 👀
Anda bisa melakukan kontribusi dengan cara fork repositori ini dan silahkan melakukan modifikasi atau penambahan fitur kemudian kirim pull request dan jangan lupa untuk menambahkan informasi pada **Change Log** terkait apa yang anda perbaiki atau tambahkan.

## Change Log 👣
```
[#0] Menambahkan api.php untuk menampilkan data dengan format JSON.
[#1] Memilah data berdasarkan Category pada api.php
```

## Lisensi ✍️
[MIT](http://opensource.org/licenses/MIT).

Copyright © 2017 Ginanjar S.B.