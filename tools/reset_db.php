<?php

$isReset = false;
if (isset($_POST['reset']) && $_POST['reset'] === 'reset') {
    $isReset = true;

    require_once __DIR__ . '/../private/bootstrap.php';
    require_once __DIR__ . '/../private/database.php';

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // 問題があった場合に例外を出す
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);

    // テーブル名一覧を取得する
    $statement = mysqli_prepare($connection, 'SELECT `TABLE_NAME` FROM `information_schema`.`TABLES` WHERE `TABLE_SCHEMA` = ?');
    mysqli_stmt_execute($statement, [DB_NAME]);
    $result = mysqli_stmt_get_result($statement);
    $tables = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    mysqli_stmt_close($statement);
    $tableNames = array_map(fn($table) => "`{$table['TABLE_NAME']}`", $tables);

    // テーブルがあった場合全て削除
    if (!empty($tableNames)) {
        mysqli_query($connection, sprintf('DROP TABLE IF EXISTS %s', implode(', ', $tableNames)));
    }

    // テーブルを作成
    $query = implode(
        PHP_EOL,
        array_map(
            fn ($file) => file_get_contents($file),
            glob(__DIR__ . '/../docker/db/init_data/*.sql')
        )
    );

    mysqli_multi_query($connection, $query);
}

?>

<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset DB</title>
</head>
<body>
<main>
    <h1>データベース初期化</h1>
    <?php if ($isReset) { ?>
        <p>リセットしました！</p>
    <?php } ?>
    <p>データベースの初期化を行う場合は「reset」と入力し実行ボタンをクリックしてください</p>
    <form action="reset_db.php" method="post">
        <label>
            <input type="text" name="reset" placeholder="reset">
        </label>
        <button type="submit">実行</button>
    </form>
</main>
<footer>
    <hr>
    (　・ω・)つ💣
    <div style="margin-top: 1rem"><a href="index.html">トップページへ</a></div>
</footer>
</body>
</html>
