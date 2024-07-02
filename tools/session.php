<?php

session_start();

?>
<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Session</title>
</head>
<body>
    <main>
        <h1>$_SESSIONに設定されている値一覧</h1>
        <table>
            <tr>
                <th>キー</th>
                <th>値</th>
            </tr>
            <?php foreach ($_SESSION as $key => $value) { ?>
                <tr>
                    <td><?= htmlspecialchars($key) ?></td>
                    <td><?= htmlspecialchars($value) ?></td>
                </tr>
            <?php } ?>
        </table>
    </main>
    <footer>
        <hr>
        (｀・ω・)🎸  🎷(・ω・´)
        <div style="margin-top: 1rem"><a href="index.html">トップページへ</a></div>
    </footer>
</body>
</html>
