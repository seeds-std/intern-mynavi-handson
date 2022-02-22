<?php
/* -------------------------------------------------------------------------------------------------------------------
 * 以下のプログラムは `articles` テーブルのデータを全件取得するプログラムです
 *
 * 1: このプログラムを動かしてみて $articles のデータの中身を確認してみてください
 * 2: $articlesのデータをforeachを使って 名前(name) と コンテンツ(content) を出力してみてください
 * 3: 今、このプログラムは全件を取得していますが、「idが2」のデータ1件のみ取得するように修正してみてください
 * 4: 「idが2」のデータはhtmlがそのまま出力されてしまっていますのでデータをエスケープしてみてください
 * ------------------------------------------------------------------------------------------------------------------- */

define('DB_HOST', 'db');
define('DB_PORT', 3306);
define('DB_NAME', 'bbs');
define('DB_USER', 'user');
define('DB_PASSWORD', 'password');

$dbh = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4;', DB_USER, DB_PASSWORD);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // エラー発生時は例外を出すようにする
$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // データの取得は連想配列で行う

$statement = $dbh->prepare('SELECT * FROM `articles` WHERE id = 2');
$statement->execute();
$articles = $statement->fetchAll();

foreach ($articles as $article) {
    echo '<div>Name: ' . $article['name'] . ' Content: ' . htmlspecialchars($article['content']) . '</div>';
}
