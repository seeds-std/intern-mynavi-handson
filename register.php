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

/* ----------------------------------------
 * セッション内に保存した投稿内容を取得する
 * ---------------------------------------- */
$name = $_SESSION['name'];
$content = $_SESSION['content'];

/* --------------------------------------------------
 * 送られてきたトークンのバリデーション
 *
 * セッションに保存されているトークンと比較し、
 * 一致していなかった場合はトップ画面にリダイレクトする
 * -------------------------------------------------- */
if($token !== $_SESSION['token'] || !isset($name) || !isset($content) || empty($name) || empty($content)) {
    unset($_SESSION['token']);
    redirect('/index.php');
}

/* --------------------
 * データのインサート処理
 * -------------------- */
$statement = $dbh->prepare('INSERT INTO `articles`(name, content) VALUES (:name, :content)');
$statement->execute([
    'name' => $name,
    'content' => $content,
]);

/* ----------------------------------------
 * セッション内のデータを削除する (名前以外)
 * ---------------------------------------- */
unset($_SESSION['token']);
unset($_SESSION['content']);

?>

<!-- 描画するHTML -->
<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登録成功</title>
</head>
<body>
    <header>
        <h1>登録成功</h1>
    </header>
    <main>
        <a href="index.php">戻る</a>
    </main>
    <footer>
        <hr>
        <div>o(・ω・k)</div>
    </footer>
</body>
</html>
