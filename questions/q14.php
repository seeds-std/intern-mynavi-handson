<?php

/* ---------------------------------------------------------------- *
 * このファイルは[PHPからデータベースへの接続]の問題です
 *
 * usersというテーブルで theme_color が 黄 となっている
 * データを全て表示するためのプログラムを書いてください
 *
 * テーブルには
 * id, name, sex, theme_color, created_at, updated_at
 * というカラムがあります
 *
 * sex, theme_color はデータがない可能性があります
 * データがない場合は「データなし」と出力してください
 * ---------------------------------------------------------------- */

define('DB_HOST', 'db');
define('DB_PORT', 3306);
define('DB_NAME', 'bbs');
define('DB_USER', 'user');
define('DB_PASSWORD', 'password');

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // 問題があった場合に例外を出す
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);

$statement = mysqli_prepare($connection, 'SELECT * FROM `users` WHERE theme_color = "黄"');
mysqli_stmt_execute($statement);
$result = mysqli_stmt_get_result($statement);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<table border="1">
    <thead>
    <tr>
        <th>ID</th>
        <th>名前</th>
        <th>性別</th>
        <th>テーマ色</th>
        <th>作成日</th>
        <th>更新日</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user) { ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['name'] ?></td>
            <td><?= $user['sex'] ?? 'データなし' ?></td>
            <td><?= $user['theme_color'] ?? 'データなし' ?></td>
            <td><?= $user['created_at'] ?></td>
            <td><?= $user['updated_at'] ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
