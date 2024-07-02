<?php
/* ---------------------------------------------------------------- *
 * このファイルは users テーブルへのSQL実験用のファイルです
 *
 * ここで実行したクエリはデータベースには保存されません
 * ---------------------------------------------------------------- */

$sql = '';



// 以下の行からは変更しないでください
define('DB_HOST', 'db');
define('DB_PORT', 3306);
define('DB_NAME', 'bbs');
define('DB_USER', 'user');
define('DB_PASSWORD', 'password');

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // 問題があった場合に例外を出す
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);

if (!mysqli_begin_transaction($connection)) {
    throw new Exception('致命的なエラーが発生しました。もしこのエラーが出た場合は教えてください。');
}

$resultHtml = '<div>データが見つかりませんでした</div>';
try {
    $statement = mysqli_prepare($connection, $sql);
    mysqli_stmt_execute($statement);
    $result = mysqli_stmt_get_result($statement);
    $isSelect = true;
    if ($result === false) {
        $isSelect = false;
        $result = mysqli_query($connection, 'SELECT * FROM `users`');
    }

    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if (!empty($users)) {
        $columns = array_keys($users[0]);

        $resultHtml = <<<HTML
<h3>実行されたクエリ</h3>
<div>{$sql}</div>
<br>
HTML;
        $resultHtml .= $isSelect
            ? '<h3>取得されたデータ</h3>'
            : '<h3>実行後のデータ</h3>';
        $resultHtml .= '<div style="display: table;">';
        $row = <<<HTML
<div style="display: table-header-group">
    <div style="display: table-row; background: #ccccf0">
        <div style="display: table-cell; border-bottom: 1px solid black; text-align: center; padding-top: 0.5rem; padding-bottom: 0.5rem; font-weight: bold;">{$columns[0]}</div>
        <div style="display: table-cell; border-bottom: 1px solid black; text-align: center; padding-top: 0.5rem; padding-bottom: 0.5rem; font-weight: bold;">{$columns[1]}</div>
        <div style="display: table-cell; border-bottom: 1px solid black; text-align: center; padding-top: 0.5rem; padding-bottom: 0.5rem; font-weight: bold;">{$columns[2]}</div>
        <div style="display: table-cell; border-bottom: 1px solid black; text-align: center; padding-top: 0.5rem; padding-bottom: 0.5rem; font-weight: bold;">{$columns[3]}</div>
        <div style="display: table-cell; border-bottom: 1px solid black; text-align: center; padding-top: 0.5rem; padding-bottom: 0.5rem; font-weight: bold;">{$columns[4]}</div>
        <div style="display: table-cell; border-bottom: 1px solid black; text-align: center; padding-top: 0.5rem; padding-bottom: 0.5rem; font-weight: bold;">{$columns[5]}</div>
    </div>
</div>
HTML;
        $resultHtml .= $row;

        foreach ($users as $index => $user) {
            $rowBackgroundColor = $index % 2 === 0 ? '#f0f0f0' : '#ffffff';
            $row = <<<HTML
<div style="display: table-row-group;">
    <div style="display: table-row; background: {$rowBackgroundColor}">
        <div style="display: table-cell; text-align: right; padding: 0.25rem 1rem;">{$user[$columns[0]]}</div>
        <div style="display: table-cell; text-align: center; padding: 0.25rem 1rem;">{$user[$columns[1]]}</div>
        <div style="display: table-cell; text-align: center; padding: 0.25rem 1rem;">{$user[$columns[2]]}</div>
        <div style="display: table-cell; text-align: center; padding: 0.25rem 1rem;">{$user[$columns[3]]}</div>
        <div style="display: table-cell; text-align: center; padding: 0.25rem 1rem;">{$user[$columns[4]]}</div>
        <div style="display: table-cell; text-align: center; padding: 0.25rem 1rem;">{$user[$columns[5]]}</div>
    </div>
</div>
HTML;
            $resultHtml .= $row;
        }
    }

} catch (Exception $e) {
    $resultHtml = empty($sql)
        ? '<div>SQLが入力されていません</div>'
        : '<div>SQLに問題があります</div>';
}

if (!mysqli_rollback($connection)) {
    throw new Exception('致命的なエラーが発生しました。もしこのエラーが出た場合は教えてください。');
}

echo $resultHtml;
