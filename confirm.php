<?php
/* ------------------------------
 * 必要なファイルを読み込む
 * ------------------------------ */
require_once 'private/exception_handler.php';
require_once 'private/helper.php';

/* --------------------
 * セッション開始
 * -------------------- */

/**
 * #5 セッション開始の宣言を行う
 * 
 * sessionとは？
 */

// session_start();

/* ------------------------------
 * 送られてきた値を取得する
 * セッションにも保存しておく
 * ------------------------------ */

/**
 * #6
 * 送られてきたであろう値を、どのような仕組み から
 * どのような指定の方法 で取得できるのか？
 * 
 * session
 * （name属性）#2 #3の振り返り 
 */

$name = '';
$content =  '';

// $name = $_SESSION['name'] = $_POST['name'];
// $content = $_SESSION['content'] =  $_POST['content'];

/* --------------------------------------------------
 * 値のバリデーションを行う
 *
 * 入力された値が正しいフォーマットで送られているかを確認する
 * 今回は値が入力されているかのみを確認する
 * -------------------------------------------------- */
if(true) {
    redirect('/index.php');
}

/**
 * #7
 * 入力が期待される内容は何だったか？ #1
 * 
 * 送信される入力に何を期待し、何を期待しないのかを列挙してみる（簡易に）。
 * 想定した条件によって必要な場合分けの条件を考える。
 * 
 * （今回は入力されていない場合を弾くことにする）requireの追加と反する？
 * 
 * if 構文による実現を考える。
 */


// if(empty($name) || empty($content)) {
//     $errors = [];
//     if(empty($name)) {
//         $errors[] = '名前を入力してください';
//     }
//     if(empty($content)) {
//         $errors[] = '投稿内容を入力してください';
//     }
//     $_SESSION['errors'] = $errors;
//     redirect('/index.php');
// }

/* ----------------------------------------
 * 確認画面と登録画面で利用するトークンを発行する
 * 今回は時刻をトークンとする
 * ---------------------------------------- */

/**
 * #8
 * トークンとは？
 * 
 * 「トークンの発行」を実現する仕組みとは？（session）
 * どのような方法で情報の埋め込みを行うのか？
 */

$token = strval(time());
// $_SESSION['token'] = $token;
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
            <!-- 
                # エンティティ化(htmlspecialchars())

                nl2br()について（要加筆？
             -->
            <!-- <tr><th>名前</th><td><?= nl2br(htmlspecialchars($name)) ?></td></tr>
            <tr><th>投稿内容</th><td><?= nl2br(htmlspecialchars($content)) ?></td></tr> -->
            </tbody>
        </table>
        <!-- 
            #9
            この部分は何をしているか？

            #1 ~ #4
         -->
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
