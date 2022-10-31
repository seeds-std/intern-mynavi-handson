<?php
/* --------------------------------------------------
 * 必要なファイルを読み込む
 * -------------------------------------------------- */
require_once 'private/bootstrap.php';

/* --------------------------------------------------
 * セッション開始
 * -------------------------------------------------- */
session_start();

/* --------------------------------------------------
 * 送られてきた値を取得
 * -------------------------------------------------- */
$name = $_POST['name'] ?? '';
$content = $_POST['content'] ?? '';
$token = $_POST['token'] ?? '';

/* --------------------------------------------------
 * 値のバリデーション
 * -------------------------------------------------- */
if($token !== $_SESSION['token'] || empty($name) || empty($content)) {
    redirect('/editing.php');
}

/* --------------------------------------------------
 * 確認画面と登録画面で利用するトークンを発行する
 * 今回は時刻をトークンとする
 * -------------------------------------------------- */
$token = $_SESSION['token'] = strval(time());
$_SESSION['edit_name'] = $name;
$_SESSION['edit_content'] =  $content;

?>

<!-- 描画するHTML -->
<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>編集確認</title>
</head>
<body>
    <header>
        <h1>確認</h1>
    </header>
    <main>
        <div>下記の内容で編集しますがよろしいですか?</div>
        <table>
            <tbody>
            <tr><th>名前</th><td><?= nl2br(htmlspecialchars($name)) ?></td></tr>
            <tr><th>内容</th><td><?= nl2br(htmlspecialchars($content)) ?></td></tr>
            </tbody>
        </table>
        <form action="edit_complete.php" method="post">
            <input type="hidden" name="token" value="<?= $token ?>">
            <button type="submit">投稿</button>
            <a href="editing.php"><button type="button">戻る</button></a>
        </form>
    </main>
    <footer>
        <hr>
        <div>( ・ω・)OK?</div>
    </footer>
</body>
</html>
