<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>線上日曆</title>
    <style>
        h1{
            text-align:center;
            color:blue;
        }
        table{
            width:70%;
            border-collapse:collapse;
            margin:0 auto;
        }
        td{
            border:1px solid blue;
            text-align:center;
            padding:5px 10px;
        }
    </style>
</head>
<body>
 <h1>線上日曆</h1>  

 <?php
$today = date("Y-m-d");
$firstDay = date("Y-m-01");
$firstDayWeek = date("w", strtotime($firstDay));
$theDaysOfMonth=date("t", strtotime($firstDay));

?>
 <table>
     <tr>
         <td>日</td>
         <td>一</td>
         <td>二</td>
         <td>三</td>
         <td>四</td>
         <td>五</td>
         <td>六</td>
     </tr>
<?php
for($i=0;$i<6;$i++){
    echo "<tr>";
    
    for($j=0;$j<7;$j++){
        $day=$j+($i*7)-$firstDayWeek;
        
        $date=date("Y-m-d", strtotime(" $day days", strtotime($firstDay)));
        
        echo "<td>";        
            echo $date;
        echo "</td>";
    }

    echo "</tr>";

}


?>
</table>

</body>
</html>