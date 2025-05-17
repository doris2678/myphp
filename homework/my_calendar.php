<?php
// 取得目前的年月（或從 URL 參數取得）
$year = isset($_GET['year']) ? intval($_GET['year']) : date('Y');
$month = isset($_GET['month']) ? intval($_GET['month']) : date('m');

// 處理前一月與下一月
$prevMonth = $month-1;
$nextMonth = $month+1;
$prevYear = $year;
$nextYear = $year;

if($prevMonth < 1) {
    $prevMonth = 12;
    $prevYear--;
}
if($nextMonth > 12) {
   $nextMonth = 1;
   $nextYear++; 
}

$today = date("Y-$month-d");
$firstDay = date("Y-$month-01");
$firstDayWeek = date("w", strtotime($firstDay));// w: 0（星期天）到 6（星期六）
$theDaysOfMonth=date("t", strtotime($firstDay));// t: 指定月份的天数	28 到 31
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>線上日曆</title>
    <style>
        body{
            font-family:'Segoe UI',Tahoma,Geneva,Verdana,sans-serif;
            margin:0;
            padding:0;
            background-image:url('./bg_img.jpg');
            background-attachment:fixed;
            background-repeat:no-repeat;
            background-position:center;
        }

        h2{
            text-align:center;
            color:white;             
            text-shadow:1px 1px 3px rgba(0,0,0,0.5);/* <x-offset> <y-offset> <blur-radius> <color>; */
            margin-top:20px;
        }

        .container{
            max-width:900px;      
            height:600px;         
            display:flex;
            margin:0 auto;
            justify-content:space-around;
            align-items:top;
        }

        .left-image{
            width:275;
            height:600px;                     
            background-color:#f0f0f0;            
            margin-top: 0;
            margin-right: auto;
            margin-bottom: 50px;
            margin-left: auto;
            padding:10px;
            border-radius:10px;                        
        }

        .left-image img{
            width:100%;            
            height:600px;         
            display:block;      
            object-fit:cover;             
        }

        .right-column{                        
            width:680px;
            height:600px;         
            display:flex;            
            flex-direction:row;            
            align-items:left;   
            flex-wrap:wrap;                       
            background-color:rgba(255,255,255,0.9);
            border-radius:10px;
            box-shadow:0px 0px 20px rgba(0,0,0,0.5);
            margin-top: 0;
            margin-right: auto;
            margin-bottom: 50px;
            margin-left: auto;
            padding:10px;
        }

        .th-item{
            width:73px;            
            height:32px;   
            line-height:25px;                        
            color:white;            
            font-size:20px;         
            font-weight:bold;
            text-align:center;                                    
            background-color:#2c3e50;
            border-radius:5px;
            margin:2px;  
            padding-top:3px;      
        }

        .item{
            width:65px;
            height:80px;
            background-color:#ecf0f1;
            text-align:center;
            margin:2px;
            padding:4px;
            border-radius:5px;
            box-shadow:0 2px 5px rgba(0,0,0,0.2);
            transition:transform 0.2s;
        }

        .day-num,
        .noworkday-num
        {        
            font-size:20px;
            font-weight:bold;            
        }

        .day-num{
            color:#2c3e50;            
        }

        .noworkday-num{            
            color:#c0392b;            
        }

        .holiday{            
            color:#e74c33c;
            font-size:16px;
            font-weight:bold;            
        }

        .pass-date{
            font-size:20px;
            font-weight:bold;            
            color:lightgray;
        }

       .nav-links {
            text-align: center;
            margin: 20px 0;
       }

       .nav-links a {
            text-decoration: none;
            font-size: 18px;
            margin: 0 10px;
            color: white;
            font-weight: bold;
        }

        .nav-links a:hover {
            color: lightblue;
        }

        .month-search{
           font-size:20px;
           text-align:center;
           color:white;
           margin-bottom:20px;           
        }

        .month-search input[type="number"]{
         width:80px;
         padding:5px;
         font-size:20px;
         text-align:center;
        }

        .month-search input[type="submit"]{
          padding:5px 10px;
          font-size:20px;
          font-weight: bold;
          background-color: white;
          color: #001f3f;
          border: 2px solid #001f3f;          
          cursor:pointer;
          margin-left:15px;
        }

        .month-search input[type="submit"]:hover{
        background-color:#cce0ff;
        }

    </style>
</head>
<body>
<h2 ><?= $year ?> 年 <?= $month ?> 月 </h2>
<div class="nav-links">
    <a href="?year=<?= $prevYear ?>&month=<?= $prevMonth ?>">< 上一月&nbsp&nbsp&nbsp&nbsp</a> &nbsp;&nbsp;
    <a href="?year=<?= $nextYear ?>&month=<?= $nextMonth ?>">下一月 ></a>
</div>

<div class="month-search">
   <form method="get" action="">
    <label for="year">年：</label>
    <input type="number" id="year" name="year" value="<?=$year?>" min="1900" max="2100">
    <label for="month">月：</label>
    <input type="number" id="month" name="month" value="<?=$month?>" min="1" max="12">
    <input type="submit" value="查詢">
   </form>
</div>

<?php
$spDate=[
    '2025-04-04'=>'兒童節',
    '2025-04-05'=>'清明節',
    '2025-05-11'=>'母親節',
    '2025-05-01'=>'勞動節',
    '2025-05-30'=>'端午節',
    '2025-06-06'=>"生日"
];

$todoList=[ '2025-05-01'=>'開會'];

$monthDays=[];

// d: 月份中的第幾天01-31
// W: 示例：42（當年的第42周）
// w: 0（星期天）到 6（星期六）
// N: 1（星期一）到 7（星期天）
// z: 一年中的第幾天(0-365)

//填入空白日期
// for($i=0;$i<$firstDayWeek;$i++){
//     $monthDays[]=[];
// }

//1.填入前月日期
 for($i=0;$i<$firstDayWeek;$i++){
      $j=$i-$firstDayWeek;
      $prev_timestamp = strtotime(" $j days", strtotime($firstDay));       
        $holiday="";
        foreach($spDate as $d=>$value){
            if($d==date("Y-m-d", $prev_timestamp)){
                $holiday=$value;
            }
        }
        $monthDays[]=[
            "day"=>date("d", $prev_timestamp),
            "fullDate"=>date("Y-m-d", $prev_timestamp),
             "week"=>date("w", $prev_timestamp),
            "workday"=>date("N", $prev_timestamp)<6?true:false,            
            "holiday"=>$holiday
        ];
}


//----------------
//2.填入當月日期
for($i=0;$i<$theDaysOfMonth;$i++){
        $timestamp = strtotime(" $i days", strtotime($firstDay));        
        $holiday="";
        foreach($spDate as $d=>$value){
            if($d==date("Y-m-d", $timestamp)){
                $holiday=$value;
            }
        }

        // $todo='';
        // foreach($todoList as $d=>$value){
        //     if($d==date("Y-m-d", $timestamp)){
        //         $todo=$value;
        //     }
        // }

        $monthDays[]=[
            "day"=>date("d", $timestamp),
            "fullDate"=>date("Y-m-d", $timestamp),
 //           "weekOfYear"=>date("W", $timestamp),
            "week"=>date("w", $timestamp),
            "workday"=>date("N", $timestamp)<6?true:false,            
//            "daysOfYear"=>date("z", $timestamp),
            "holiday"=>$holiday
//            "todo"=>$todo
        ];
}

//-----------------
//3.填入下月日期  
 $lastDay=date('Y-m-t', strtotime($firstDay));
 $lastdayofweek = date("w", strtotime($lastDay));  
 for($i=0;$i<6-$lastdayofweek;$i++){
      $j=$i+1;
      $next_timestamp = strtotime(" $j days", strtotime($lastDay));       
        $holiday="";
        foreach($spDate as $d=>$value){
            if($d==date("Y-m-d", $next_timestamp)){
                $holiday=$value;
            }
        }
        $monthDays[]=[
            "day"=>date("d", $next_timestamp),
            "fullDate"=>date("Y-m-d", $next_timestamp),
             "week"=>date("w", $next_timestamp),
            "workday"=>date("N", $next_timestamp)<6?true:false,            
            "holiday"=>$holiday
        ];
} 
//--------------------


//container ***begin***
echo "<div class='container'>";
 echo "<div class='left-image'><img src='./img01.jpg' alt='圖片'> </div>";
//建立外框及標題
//right-column ***begin***
  echo "<div class='right-column'>";
    //th-item       
    echo "<div class='th-item'>日</div>";
    echo "<div class='th-item'>一</div>";
    echo "<div class='th-item'>二</div>";
    echo "<div class='th-item'>三</div>";
    echo "<div class='th-item'>四</div>";
    echo "<div class='th-item'>五</div>";
    echo "<div class='th-item'>六</div>";     

//使用foreach迴圈,印出日期   
 foreach($monthDays as $day){ 
  //item ***begin***
  echo "<div class='item'>";

     //day-info ***begin***    
     echo "<div class='day-info'>";

        //daynum ***begin***     
        //echo "<div class='day-num'>";              
        if(isset($day['day'])){
            if(strtotime($day['fullDate'])<strtotime($firstDay) || strtotime($day['fullDate'])>strtotime($lastDay)){
             echo "<div class='pass-date'>";
            }else if($day['workday']){               
             echo "<div class='day-num'>";                             
            }else{
              echo "<div class='noworkday-num'>";                             
            }           
            echo $day["day"];             
         }else{
             echo "<div class='day-num'>";                          
             echo "&nbsp;";
         } 
       echo "</div>";
      //daynum ***end***     

       //day-week ***begin***     
    //    echo "<div class='day-week'>";
    //     if(isset($day['weekOfYear'])){
    //         echo $day["weekOfYear"];
    //     }else{
    //         echo "&nbsp;";
    //     }
    //    echo "</div>";
      //day-week ***end***     

     echo "</div>";
     //day-info ***end***

     
     //holiday-info ***begin***    
     echo "<div class='holiday-info'>";
     if(isset($day['holiday'])){
         echo "<div class='holiday'>";
         echo $day['holiday'];
         echo "</div>";
     }else{
         echo "&nbsp;";
     }
     echo "</div>";
     //holiday-info ***end***      
    
     //todo-info ***begin***    
    //  echo "<div class='todo-info'>";
    //  if(isset($day['todo']) && !empty($day['todo'])){        
    //       echo "<div class='todo'>";
    //       echo $day['todo'];
    //       echo "</div>";        
    //  }else{
    //       echo "&nbsp;";
    //  }
    //  echo "</div>";
     //todo-info ***end***    

   echo "</div>";
   //item ***end***
}

 echo "</div>";
 //right-column ***end***
echo"</div>";
//-container ***end***
?>

</body>
</html>