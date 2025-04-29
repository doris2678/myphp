<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      #tt{
        border-collapse:collapse;
        margin:20px;
        box: shadow 2px 2px 15px blue;   
      }

      #tt td{
       paddding: 3px; 6px;
       border: 1px solid #CCc;
       text-align:center;
       width:25px;
       text-shadow:1px 1px 2px #99f;
      }

      #tt tr:nth-child(1)
      ,#tt td:nth-child(1){
       background-color:#999;
       color:white;
      }

      #tt td:hover{
        background-color:green;
        color:skyblue;
      }



    </style>
</head>
<body>
<h1>使用for迴圈來產生以下的數列</h1>

<?php
// 使用for迴圈來產生以下的數列
// 1,3,5,7,9……n
for ($i=1; $i <30 ; $i=$i+2) { 
    echo $i.",";
}
echo "<br>";

// 10,20,30,40,50,60……n
for ($i=10; $i <100 ; $i=$i+10) { 
    echo $i.",";
}
echo "<br>";

// 3,5,7,11,13,17……97 (質數:一個大於1 的整數除了1 和本身以外，沒有其他的因數。 1 不是質數也不是合數。 2 是偶數，也是最小的質數。)
for ($i=2; $i <100 ; $i=$i+1) { 
    $i=$i+1;
    echo $i.",";
}
echo "</br>";

for ($j=3; $j<100 ; $j++) { 
    $test=true;
    $count=0;
    for ($i=2; $i <$j ; $i=$i+1) { //偶數不是質數,不用跑
        $count++;
        if ($j % $i==0 ){      
           $test=false;
           break;
        }
    }

    if ($test){
        echo $j.",";
    }
    
    // echo "<br>";
    // echo "迴圈跑了".$count."次";        
}
?>

<h2>九九乘法表</h2>
<table border=1>
<?php    
 for ($i=1; $i <=9 ; $i++) { 
    echo "<tr>";
    for ($j=1; $j <=9 ; $j++) {         
     echo "<td>".$j."*".$i."=".$i*$j."</td>";            
    }
    echo "</tr>";
 }
?>
</table>

<h2>以交叉計算結果呈現九九乘叉算法</h2>
<table id='tt' border=1>
<?php    
 echo "<tr><td>"; 
 for ($k=1; $k <=9; $k++) { 
   echo "<td>".$k."</td>";
 }
 echo "</tr>"; 

 for ($i=1; $i <=9 ; $i++) { 
    echo "<tr>"."<td>".$i."</td>";
    for ($j=1; $j <=9 ; $j++) {         
     echo "<td>".$i*$j."</td>";            
    }
    echo "</tr>";
 }
?>
</table>


</body>
</html>