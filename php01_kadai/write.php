<?php
$start_time = $_POST['start_time'];
$end_time = $_POST['end_time'];

// 時間の計算
$start = new DateTime("$date $start_time");
$end = new DateTime("$date $end_time");
$interval = $start->diff($end);

// 時間と分をそれぞれ取得
$hours = $interval->h;
$minutes = $interval->i;

// 時間と分の合計時間を計算し、小数点以下の時間を切り捨てる
$total_hours = $hours + floor($minutes / 60);

$data =  $total_hours . "時間\n";

echo "<p>装着時間が記録されました。</p>";
echo "<a href='post.php'>戻る</a> | <a href='read.php'>記録を見る</a>";

// 書き込む（上書き）
file_put_contents('data/data.txt', $data, FILE_APPEND);
?>

