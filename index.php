<?php
/* ---------------------------------------- *
 * 必要なファイルを読み込む
 * ---------------------------------------- */
require_once 'private/bootstrap.php';
require_once 'private/database.php';

/* ---------------------------------------- *
 * セッション開始
 * ---------------------------------------- */
session_start();

/* ---------------------------------------- *
 * データベース接続
 * ---------------------------------------- */
$connection = connectDB();

/* ---------------------------------------- *
 * データベースから投稿されている内容を取得する
 * ---------------------------------------- */
$statement = mysqli_prepare($connection, 'SELECT * FROM `articles`');
mysqli_stmt_execute($statement);
$result = mysqli_stmt_get_result($statement);
$articles = mysqli_fetch_all($result, MYSQLI_ASSOC);

$errors = $_SESSION['errors'] ?? [];

?>

<!-- 描画するHTML -->
<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>インターンシップ掲示板</title>
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
        <h1>インターンシップ掲示板</h1>
    </header>
    <main>
        <ul>
            <?php foreach ($articles as $article) { ?>
                <li>
                    <div>
                        <?= $article['id'] ?>:&nbsp;<?= nl2br(htmlspecialchars($article['name'])) ?>&nbsp;<?= $article['updated_at'] ?><?= $article['created_at'] === $article['updated_at'] ? '' : '<small>(編集済)</small>' ?>
                    </div>
                    <div><?= nl2br(htmlspecialchars($article['content'])) ?></div>
                    <div style="display: inline-flex">
                        <form action="editing.php" method="post">
                            <input type="hidden" name="id" value="<?= $article['id'] ?>">
                            <button type="submit">編集</button>
                        </form>
                        &nbsp;
                        <form action="delete_confirm.php" method="post">
                            <input type="hidden" name="id" value="<?= $article['id'] ?>">
                            <button type="submit">削除</button>
                        </form>
                    </div>
                </li>
                <br/>
            <?php } ?>
        </ul>
        <div>
            <?php if(!empty($errors)) { ?>
                <ul>
                    <?php foreach($errors as $error) { ?>
                        <li><?= $error ?></li>
                    <?php } ?>
                </ul>
            <?php } ?>
            <form action="post_confirm.php" method="post">
                <table>
                    <thead>
                    <tr>
                        <th colspan="2">新規投稿</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th><label for="name">名前</label></th>
                        <td><input type="text" name="name" id="name" value="<?= htmlspecialchars($_SESSION['name'] ?? $_COOKIE['user_name'] ?? '') ?>" required></td>
                    </tr>
                    <tr>
                        <th><label for="content">投稿内容</label></th>
                        <td><textarea name="content" id="content" rows="4" required><?= htmlspecialchars($_SESSION['content'] ?? '') ?></textarea></td>
                    </tr>
                    </tbody>
                </table>
                <button type="submit">投稿</button>
            </form>
        </div>
    </main>
    <footer>
        <hr>
        <div style="float:left">(b・ω・)b</div>
        <div style="float:right">Server: <?= $_SERVER['SERVER_ADDR'] ?></div>
    </footer>
</body>
</html>

<?php
/* --------------------
 * Session削除
 * -------------------- */
foreach (array_keys($_SESSION ?? []) as $key) {
    unset($_SESSION[$key]);
}
