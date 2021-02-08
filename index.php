<?php
/* ------------------------------
 * 必要なファイルを読み込む
 * ------------------------------ */
require_once 'private/exception_handler.php';

/**
 * @var PDO $dbh データベースハンドラ
 */

/* --------------------
 * セッション開始
 * -------------------- */

/* ----------------------------------------
 * データベースから投稿されている内容を取得する
 * ---------------------------------------- */

// ダミーデータ
$articles = [
    ['id' => 1, 'name' => 'Dummy', 'content' => 'Dummyコンテンツ', 'created_at' => '2020-12-09 00:00:00', 'updated_at' => '2020-12-09 00:00:00'],
    ['id' => 2, 'name' => 'ダミー', 'content' => 'ダミーContent', 'created_at' => '2020-12-09 12:00:00', 'updated_at' => '2020-12-09 12:00:00'],
]

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
                        <?= $article['id'] ?>:&nbsp;<?=$article['name'] ?>&nbsp;<?= $article['updated_at'] ?>
                    </div>
                    <div><?= $article['content'] ?></div>
                    <div style="display: inline-flex; display: none">
                        <form action="editing.php" method="post">
                            <input type="hidden" name="id" value="<?= $article['id'] ?>">
                            <button type="submit">編集</button>
                        </form>
                        &nbsp;
                        <form action="confirm_delete.php" method="post">
                            <input type="hidden" name="id" value="<?= $article['id'] ?>">
                            <button type="submit">削除</button>
                        </form>
                    </div>
                </li>
                <br/>
            <?php } ?>
        </ul>
        <div>
            <!-- 
                #1 formタグにて任意の情報の入力を行う。
                今回は入力をinputタグ、textareaタグの2箇所にてそれぞれ行う。

                #2 inputタグではテキスト形式の入力（type="text"）が期待されており、実際に'name'というIDが振られている（id="name"）。
                また、（name="name"）によって送信先にて送信した入力内容にアクセスできる（後述）。

                #3 textareaタグでは複数行にわたるテキスト入力を期待しており、（以下上と同様の説明）。
             -->
            <form action="confirm.php" method="post">
                <table>
                    <thead>
                    <tr>
                        <th colspan="2">新規投稿</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th><label for="name">名前</label></th>
                        <td><input type="text" name="name" id="name" required></td>
                        <!-- # 初期値の指定(value) -->
                        <!-- # エンティティ化(htmlspecialchars()) -->
                        <!-- <td><input type="text" name="name" id="name" value="<?= htmlspecialchars($_COOKIE['user_name'] ?? '') ?>"></td> -->
                    <tr>
                        <th><label for="content">投稿内容</label></th>
                        <td><textarea name="content" id="content" rows="4" required></textarea></td>
                    </tr>
                    </tbody>
                </table>
                <!-- 
                    #4（type="submit"）にて、formタグ内にて、これまでに入力した内容を予め指定した送り先（action="confirm.php"）
                    へ予め指定したリクエスト方式（method="post"）にて送信する。
                 -->
                <button type="submit">投稿</button>
            </form>
        </div>
    </main>
    <footer>
        <hr>
        <div>(b・ω・)b</div>
    </footer>
</body>
</html>
