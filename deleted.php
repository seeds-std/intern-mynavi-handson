<?php
/* ------------------------------
 * 必要なファイルを読み込む
 * ------------------------------ */
require_once 'private/exception_handler.php';
require_once 'private/database.php';
require_once 'private/helper.php';

/**
 * @var PDO $dbh データベースハンドラ
 */

/* --------------------
 * セッション開始
 * -------------------- */
session_start();

/* ------------------------------
 * 送られてきた値を取得する
 * ------------------------------ */
$token = $_POST['token'] ?? '';

/* --------------------------------------------------
 * 送られてきたトークンのバリデーション
 *
 * セッションに保存されているトークンと比較し、
 * 一致していなかった場合はトップ画面にリダイレクトする
 * -------------------------------------------------- */
if($token !== $_SESSION['token']) {
    unset($_SESSION['token']);
    redirect('/index.php');
}

/* ----------------------------------------
 * セッション内に保存したIDを取得する
 * ---------------------------------------- */
$id = $_SESSION['id'];

/* --------------------
 * データの削除処理
 * -------------------- */
$statement = $dbh->prepare('DELETE FROM `articles` WHERE id = :id');
$statement->execute([
    'id' => $id,
]);

/* ------------------------------
 * セッション内のデータを削除する
 * ------------------------------ */
unset($_SESSION['token']);
unset($_SESSION['id']);

?>

<!-- 描画するHTML -->
<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>削除成功</title>
</head>
<body>
    <header>
        <h1>削除成功</h1>
    </header>
    <main>
        <a href="index.php">戻る</a>
    </main>
    <footer>
        <hr>
        <div>(　・ω・)ノ</div>
    </footer>
</body>
</html>
