<?php
/* ------------------------------
 * 必要なファイルを読み込む
 * ------------------------------ */
require_once 'private/exception_handler.php';
require_once 'private/helper.php';

/* --------------------
 * セッション開始
 * -------------------- */

/* ------------------------------
 * 送られてきた値を取得する
 * セッションにも保存しておく
 * ------------------------------ */
$name = '';
$content =  '';

/* --------------------------------------------------
 * 値のバリデーションを行う
 *
 * 入力された値が正しいフォーマットで送られているかを確認する
 * 今回は値が入力されているかのみを確認する
 * -------------------------------------------------- */
if(true) {
    redirect('/index.php');
}

/* ----------------------------------------
 * 確認画面と登録画面で利用するトークンを発行する
 * 今回は時刻をトークンとする
 * ---------------------------------------- */
$token = strval(time());

?>

<!-- 描画するHTML -->
<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>投稿確認</title>
</head>
<body>
    <header>
        <h1>確認</h1>
    </header>
    <main>
        <div>下記の内容で投稿しますがよろしいですか?</div>
        <table>
            <tbody>
            <tr><th>名前</th><td><?= $name ?></td></tr>
            <tr><th>投稿内容</th><td><?= $content ?></td></tr>
            </tbody>
        </table>
        <form action="register.php" method="post">
            <input type="hidden" name="token" value="<?= $token ?>">
            <button type="submit">投稿</button>
        </form>
    </main>
    <footer>
        <hr>
        <div>_〆(・ω・;)</div>
    </footer>
</body>
</html>
