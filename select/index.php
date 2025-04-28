<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>選擇結構</title>
</head>
<body>
<h1>判斷成績</h1>    
<p>給定一個成績數字,判斷是否及格(60)分</p>
<p>
   1.不及格使用紅字顯示,及格使用綠色顯示 
</p>
<p>
   2.判斷$$score是否是數字,如果不是數字,則提示錯誤
</p>

<?php
//給定一個成績數字，判斷是否及格(60)分
 $score="aa";
 if(!is_numeric($score) || $score<0 || $score >100){
   echo "請輸入合法的成績數字";
   exit();
} 

 echo "你的成績是:".$score."分";
 echo "<br>";
 echo "判定結果:";
 
  if ($score>=60) {  
   echo "<span style='color:green'>及格</span>";
  }else {
    echo "<span style='color:red'>不及格</span>";
  }


//0 ~ 59 => E
//60 ~ 69 => D
//70 ~ 79 => C
//80 ~ 89 => B
//90 ~ 100 => A
// $score2=90;
// if ($score2<60) {
//     echo "E";    
// }elseif($score2>=60 && $score2<70){
//     echo "D";    
// }elseif($score2>=70 && $score2<80){
//     echo "C";    
// }elseif($score2>=80 && $score2<90){
//     echo "B";    
// }
// else {
//     echo "A";    
// }

?>
</body>
</html>