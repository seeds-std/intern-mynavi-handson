<?php
/* -------------------------------------------------- *
 * 必要なファイルを読み込む
 * -------------------------------------------------- */
require_once 'private/bootstrap.php';
require_once 'private/database.php';

/* -------------------------------------------------- *
 * セッション開始
 * -------------------------------------------------- */
session_start();

/* -------------------------------------------------- *
 * 送られてきた値を取得する
 * セッションにも保存しておく
 * -------------------------------------------------- */
$id = $_SESSION['edit_id'] = $_POST['id'] ?? $_SESSION['edit_id'] ?? '';

/* -------------------------------------------------- *
 * 値のバリデーションを行う
 *
 * 1.値が入力されているか
 * 2.データベースに対象IDのレコードが存在するか
 * -------------------------------------------------- */
// 1.値が入力されているか
if(empty($id)) {
    redirect('/index.php');
}

// 2.データベースに対象IDのレコードが存在するか
$connection = connectDB();
$statement = mysqli_prepare($connection, 'SELECT * FROM `articles` WHERE id = ?');
mysqli_stmt_bind_param($statement, 'i', $id);
mysqli_stmt_execute($statement);
$result = mysqli_stmt_get_result($statement);
$articles = mysqli_fetch_all($result, MYSQLI_ASSOC);

if(empty($articles) || empty($articles[0])) {
    redirect('/index.php');
}

$article = $articles[0];

/* -------------------------------------------------- *
 * 編集する投稿のデータ
 * -------------------------------------------------- */
$name = $_SESSION['edit_name'] ?? $article['name'];
$content = $_SESSION['edit_content'] ?? $article['content'];

unset($_SESSION['edit_name']);
unset($_SESSION['edit_content']);

/* -------------------------------------------------- *
 * 編集画面と編集完了画面で利用するトークンを発行する
 * 今回は時刻をトークンとする
 * -------------------------------------------------- */
$token = $_SESSION['token'] = strval(time());

?>

<!-- 描画するHTML -->
<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>投稿編集</title>
    <style>
        textarea {
            resize: vertical;
        }
        textarea, input[type=text] {
            border: solid 1px gray;
            box-sizing: border-box;
            padding: 4px;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <h1>投稿編集</h1>
    </header>
    <main>
        <form action="edit_confirm.php" method="post">
            <input type="hidden" name="token" value="<?= $token ?>">
            <table>
                <tbody>
                <tr>
                    <th><label for="name">名前</label></th>
                    <td><input type="text" name="name" id="name" value="<?= htmlspecialchars($name) ?>" required></td>
                </tr>
                <tr>
                    <th><label for="content">投稿内容</label></th>
                    <td><textarea name="content" id="content" rows="4" required><?= htmlspecialchars($content) ?></textarea></td>
                </tr>
                </tbody>
            </table>
            <button type="submit">編集</button>
        </form>
    </main>
    <footer>
        <hr>
        <div>＿φ(・ω・　)</div>
    </footer>
</body>
</html>
