<!-- <?php
// ファイルを開く
$data = file_get_contents('data/data.txt',);
// nl2brはbrタグとおなじ
echo nl2br($data);
// ファイル内容を1行ずつ読み込んで出力

// ファイルを閉じる

?> -->

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>装着時間記録一覧</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Chart.jsをインポート -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100 p-4">
    <div class="max-w-lg mx-auto bg-white shadow-xl rounded-xl p-6">
        <h1 class="text-xl font-bold mb-4">🦷 マウスピース装着時間記録一覧</h1>
        <table class="w-full border-collapse mb-4">
            <thead>
                <tr>
                    <th class="border p-2">装着時間 (時間)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $labels = [];
                $data_points = [];
                if (file_exists('data/data.txt')) {
                    $file = fopen('data/data.txt', 'r');
                    $index = 1;
                    while (($line = fgets($file)) !== false) {
                        $hours = floatval(str_replace("時間", "", $line));
                        echo "<tr>";
                        echo "<td class='border p-2'>" . $hours . " 時間</td>";
                        echo "</tr>";

                        // データをグラフ用に保存
                        $labels[] = "記録 " . $index;
                        $data_points[] = $hours;
                        $index++;
                    }
                    fclose($file);
                }
                ?>
            </tbody>
        </table>
        
        <canvas id="usageChart" width="400" height="200"></canvas>
    </div>

    <script>
        // Chart.jsのコード
        var ctx = document.getElementById('usageChart').getContext('2d');
        var usageChart = new Chart(ctx, {
            type: 'bar', // グラフの種類（bar, line, etc.）
            data: {
                labels: <?php echo json_encode($labels); ?>,
                datasets: [{
                    label: '装着時間 (時間)',
                    data: <?php echo json_encode($data_points); ?>,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>