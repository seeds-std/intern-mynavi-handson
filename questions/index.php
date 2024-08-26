<?php
require_once '../private/bootstrap.php';

/* -------------------- *
 * ルーティング処理
 * -------------------- */
$requestUri = str_remove_prefix($_SERVER['DOCUMENT_ROOT'] . $_SERVER['REQUEST_URI'], __DIR__);
$requestUri = str_remove_prefix($requestUri, '/');
$requestUri = explode('?', $requestUri)[0];

if (empty($requestUri) || $requestUri === 'index.php') {
    // このファイルへのアクセス
    $pageTitle = '問題トップページ';
    $content = <<<HTML
<ul>
    <li><a href="q01.php">問題1</a></li>
    <li><a href="q02.php">問題2</a></li>
    <br>
    <li><a href="q03.php">問題3</a></li>
    <li>
        <a href="q04.php">問題4</a>
        <ul>
            <li><a href="q04EX1.php">問題4EX1</a></li>
            <li><a href="q04EX2.php">問題4EX2</a></li>
        </ul>
    </li>
    <li>
        <a href="q05.php">問題5</a>
        <ul>
            <li><a href="q05EX1.php">問題5EX1</a></li>
            <li><a href="q05EX2.php">問題5EX2</a></li>
        </ul>
    </li>
    <br>
    <li>
        <a href="q06.php">問題6</a>
        <ul>
            <li><a href="q06EX.php">問題6EX</a></li>
        </ul>
    </li>
    <li><a href="q07.php">問題7</a></li>
    <br>
    <li>
        <a href="q08.php">問題8</a>
        <ul>
            <li><a href="q08EX1.php">問題8EX1</a></li>
            <li><a href="q08EX2.php">問題8EX2</a></li>
        </ul>
    </li>
    <li><a href="q09.php">問題9</a></li>
    <br>
    <li>
        <a href="q10.php">問題10</a>
        <ul>
            <li><a href="q10EX.php">問題10EX</a></li>
        </ul>
    </li>
    <li><a href="q11.php">問題11</a></li>
    <li>
        <a href="q12.php">問題12</a>
        <ul>
            <li><a href="q12EX.php">問題12EX</a></li>
        </ul>
    </li>
    <br>
    <li><a href="sql_test.php">SQL実験場</a></li>
    <li><a href="q13.php">問題13</a></li>
    <li><a href="q14.php">問題14</a></li>
    <br>
    <li><a href="q15.php">問題15</a></li>
</ul>
HTML;
} else {
    // 問題ファイルへのアクセス
    $scriptPath = __DIR__ . '/' . $requestUri;

    // 存在しないファイルへのアクセスはトップページへリダイレクトする
    if (! file_exists($scriptPath)) {
        redirect('/questions/index.php');
    }

    // ページタイトルの生成
    $matches = [];
    if (preg_match('/q0*(\d+(EX\d*)?)\.php/', $requestUri, $matches)) {
        $pageTitle = htmlspecialchars('問題' . $matches[1]);
    } else {
        $pageTitle = htmlspecialchars(preg_replace('/[^a-zA-Z0-9]/', ' ', strtoupper(substr($requestUri, 0, -4))));
    }

    if (!ob_start()) {
        throw new Exception('致命的なエラーが発生しました。もしこのエラーが出た場合は教えてください。');
    }

    require_once $scriptPath;

    $content = ob_get_clean();

    if ($content === false) {
        throw new Exception('致命的なエラーが発生しました。もしこのエラーが出た場合は教えてください。');
    }

    $content = ltrim($content);

    // HTMLっぽかったらそのまま出力
    if (preg_match('/^<(!doctype )?html/i', $content)){
        echo $content;
        exit;
    }
}
?>
<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $pageTitle ?></title>
</head>
<body>
<header>
    <h1><?= $pageTitle ?></h1>
</header>
<main>
<?= $content ?>
</main>
<footer>
    <hr>
    <div>難しかったり、分からないことがあったりしたら教えてね(・ω・∩)</div>
    <div style="margin-top: 1rem"><a href="index.php">問題トップページへ</a></div>
</footer>
</body>
</html>
