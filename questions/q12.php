<?php

/* -------------------------------------------------------- *
 * このファイルは[Session]の問題です
 *
 * 現在セッション初期化日時がページを更新するたびに更新されます
 * これを初期化されないようにしてください
 * -------------------------------------------------------- */

// 初期化日時がない場合初期化する
if (!isset($_SESSION['init_time'])) {
    $_SESSION['init_time'] = time();
}

?>

<div>セッション初期化日時: <?= date('Y-m-d H:i:s', $_SESSION['init_time'] + 32400) ?></div>
