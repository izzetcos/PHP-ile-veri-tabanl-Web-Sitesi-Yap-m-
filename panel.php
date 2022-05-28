<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1>VERİ TABANI BİLGİLERİ</h1>

<table id="customers">
  <tr>
    <th>Ad Soyad</th>
    <th>Telefon</th>
    <th>Email</th>
    <th>Konu</th>
    <th>Messaj</th>
  </tr>
  

<?php

session_start();

if ($_SESSION["USER"]=="") {
  echo" <script>window.location.href='cikis.php'</script>";
}
else{

  echo "Kullanıcı Adınız  : ".$_SESSION["USER"]."<br>";
  echo "<a href='cikis.php'> CIKIŞ YAP </a><br><br><br>";

include("baglanti.php");

$sec="Select * from iletisim";
$sonuc=$baglan->query($sec);

if ($sonuc->num_rows>0) {
  while ($cek=$sonuc->fetch_assoc())
  {
    
  echo "
  <tr>
    <td>".$cek['adsoyad']."</td>
    <td>".$cek['telefon']."</td>
    <td>".$cek['email']."</td>
    <td>".$cek['konu']."</td>
    <td>".$cek['messaj']."</td>
  </tr>"; 
    
  }

}

else{

  echo "veri tabanında hiçbir veri bulunamamıştır..";

}

}


?>

</table>

</body>
</html>
