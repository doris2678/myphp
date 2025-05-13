<!DOCTYPE html>
<?php
//設定頁面每1秒自動重整
// header("refresh:1");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>日期/時間</title>
</head>
<body>
  <h1>期/時間</h1>
  <h2>基本函式使用</h2>
<?php

   date_default_timezone_set("Asia/Taipei");//設定時區
   echo "台北:";
   echo date("Y-m-d H:i:s");//取得當前的日期和時間
   echo "<br>";
   echo "東京:";
   date_default_timezone_set("Asia/Tokyo");//設定時區
   echo date("Y-m-d H:i:s");//取得當前的日期和時間
   echo "<br>";
   echo "曼谷:";
   date_default_timezone_set("Asia/Bangkok");//設定時區
   echo date("Y-m-d H:i:s");//取得當前的日期和時間
   echo "<br>";
   echo "紐約:";
   date_default_timezone_set("America/New_York");//設定時區
   echo date("Y-m-d H:i:s");//取得當前的日期和時間   

?>
    
</body>
</html>