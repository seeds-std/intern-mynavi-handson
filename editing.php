<?php
/* ------------------------------
 * 必要なファイルを読み込む
 * ------------------------------ */
require_once 'private/exception_handler.php';
require_once 'private/session_handler.php';
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
 * セッションにも保存しておく
 * ------------------------------ */
$id = $_SESSION['edit_id'] = $_POST['id'] ?? $_SESSION['edit_id'] ?? '';

/* --------------------------------------------------
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
$statement = $dbh->prepare('SELECT * FROM `articles` WHERE id = :id');
$statement->execute(['id' => $id]);
$result = $statement->fetch();

if($result === false) {
    redirect('/index.php');
}

/* --------------------
 * 編集する投稿のデータ
 * -------------------- */
$name = $_SESSION['edit_name'] ?? $result['name'];
$content = $_SESSION['edit_content'] ?? $result['content'];

unset($_SESSION['edit_name']);
unset($_SESSION['edit_content']);

/* ----------------------------------------
 * 編集画面と編集完了画面で利用するトークンを発行する
 * 今回は時刻をトークンとする
 * ---------------------------------------- */
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
        <form action="confirm_edit.php" method="post">
            <input type="hidden" name="token" value="<?= $token ?>">
            <table>
                <tbody>
                <tr>
                    <th><label for="name">名前</label></th>
                    <td><input type="text" name="name" id="name" value="<?= htmlspecialchars($name) ?>" required></td>
                </tr>
                <tr>
                    <th><label for="content">投稿内容</label></th>
                    <td><textarea name="content" id="content" rows="4" required><?= $content ?></textarea></td>
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
