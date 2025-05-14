<?php
// 取得目前的年月（或從 URL 參數取得）
$year = isset($_GET['year']) ? intval($_GET['year']) : date('Y');
$month = isset($_GET['month']) ? intval($_GET['month']) : date('n');

// 處理前一月與下一月
$prevMonth = $month - 1;
$nextMonth = $month + 1;
$prevYear = $year;
$nextYear = $year;

if ($prevMonth < 1) {
    $prevMonth = 12;
    $prevYear--;
}
if ($nextMonth > 12) {
    $nextMonth = 1;
    $nextYear++;
}

// 當前日期
$today = date('Y-m-d');

// 當月第一天的時間戳
$firstDayTimestamp = mktime(0, 0, 0, $month, 1, $year);
$daysInMonth = date('t', $firstDayTimestamp);
$firstWeekday = date('w', $firstDayTimestamp);
$weekdays = ['日', '一', '二', '三', '四', '五', '六'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $year ?>年<?= $month ?>月 萬年曆</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 500px;
        }
        th, td {
            border: 1px solid #aaa;
            text-align: center;
            padding: 10px;
        }
        th {
            background-color: #f0f0f0;
        }
        .today {
            background-color: #ffecb3;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h2><?= $year ?> 年 <?= $month ?> 月</h2>
    <a href="?year=<?= $prevYear ?>&month=<?= $prevMonth ?>">《 上一月</a> |
    <a href="?year=<?= $nextYear ?>&month=<?= $nextMonth ?>">下一月 》</a>

    <table>
        <tr>
            <?php foreach ($weekdays as $day): ?>
                <th><?= $day ?></th>
            <?php endforeach; ?>
        </tr>
        <tr>
            <?php
            // 補空格直到第一天
            for ($i = 0; $i < $firstWeekday; $i++) {
                echo "<td></td>";
            }

            // 印出每一天
            for ($day = 1; $day <= $daysInMonth; $day++) {
                $dateStr = sprintf('%04d-%02d-%02d', $year, $month, $day);
                $class = ($dateStr === $today) ? 'today' : '';

                echo "<td class='$class'>{$day}</td>";

                if (($firstWeekday + $day) % 7 == 0) {
                    echo "</tr><tr>";
                }
            }
            ?>
        </tr>
    </table>
</body>
</html>