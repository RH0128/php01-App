<html>

<head>
    <meta charset="utf-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Zen+Kaku+Gothic+New&display=swap" rel="stylesheet">
    <style>
      body {
        font-family: 'Zen+Kaku+Gothic+New', sans-serif;
      }
    </style>

    <title>装着時間の記録</title>
</head>

<body class="p-10 bg-blue-50">
   <div class="flex justify-center flex-col max-w-md mx-auto bg-white shadow-md rounded-xl p-8">
        <h1 class="text-xl text-center font-bold mb-6">🦷 マウスピース装着時間記録 🦷</h1>

        <form action="write.php" method="post" class="space-y-6">
            <div>
                    <label for="start_time" class="block text-gray-700 mb-2">装着開始時間:</label>
                    <input type="time" id="start_time" name="start_time" required class="border border-gray-300 rounded p-2 w-full">
            </div>
            <div>
                    <label for="end_time" class="block text-gray-700 mb-2">装着終了時間:</label>
                    <input type="time" id="end_time" name="end_time" required class="border border-gray-300 rounded p-2 w-full">
            </div>
            <!-- パスワード欄を追加してみる。 -->
            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600">送信</button>
        </form>

     </div>
</body>

</html>
