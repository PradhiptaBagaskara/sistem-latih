<?php
                include "conf/inc.koneksi.php";

              $ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
              $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
              $waktu   = time(); // 

              // Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini 
              $s = mysqli_query($koneksi, "SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
              // Kalau belum ada, simpan data user tersebut ke database
              if(mysqli_num_rows($s) == 0){
                mysqli_query($koneksi, "INSERT INTO statistik(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
              } 
              else{
                mysqli_query($koneksi, "UPDATE statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
              }

              $pengunjung       = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip"));
              $totalpengunjung  = mysqli_fetch_array(mysqli_query($koneksi, "SELECT COUNT(hits) FROM statistik")); 
              $hits             = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT SUM(hits) as hitstoday FROM statistik WHERE tanggal='$tanggal' GROUP BY tanggal")); 
              $totalhits        = mysqli_fetch_array(mysqli_query($koneksi, "SELECT SUM(hits) FROM statistik")); 
              $tothitsgbr       = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT SUM(hits) FROM statistik")); 
              $bataswaktu       = time() - 300;
              $pengunjungonline = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM statistik WHERE online > '$bataswaktu'"));

              $path = "counter/";
              $ext = ".png";

              $tothitsgbr = sprintf("%06d", $tothitsgbr);
              for ( $i = 0; $i <= 9; $i++ ){
                   $tothitsgbr = str_replace($i, "<img src='$path$i$ext' alt='$i'>", $tothitsgbr);
              }

              echo "<p align=center>$tothitsgbr </p>
                    <table height=150>
                    <tr><td><img src=counter/hariini.png> Pengunjung hari ini </td><td> : $pengunjung </td></tr>
                    <tr><td><img src=counter/total.png> Total pengunjung </td><td> : $totalpengunjung[0] </td></tr>
                    <tr><td><img src=counter/hariini.png> Hits hari ini </td><td> : $hits[hitstoday] </td></tr>
                    <tr><td><img src=counter/total.png> Total Hits </td><td> : $totalhits[0] </td></tr>
                    <tr><td><img src=counter/online.png> Pengunjung Online </td><td> : $pengunjungonline </td></tr>
                    </table>";
            ?>