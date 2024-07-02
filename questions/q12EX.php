<?php

/* ---------------------------------------------------------------- *
 * このファイルは[Session]の問題です
 *
 * 現在ページを開くと足し算の式が表示されます
 *
 * 答えが送信されていなかった場合、同じ問題を表示されるようにしてください
 *
 * 答えが送信されていた場合、正誤判定を行い
 * 1. 正解の場合は「正解です」と表示し、新しい問題を表示してください
 * 2. 不正解の場合は「不正解です」と表示し、同じ問題を表示してください
 * ---------------------------------------------------------------- */
session_start();

// 問題がセッションに入っており、答えが送られてきていた場合正誤判定を行う
if (isset($_SESSION['x'], $_SESSION['y']) && isset($_POST['answer'])) {
    $answer = $_POST['answer'];
    $correct = $_SESSION['x'] + $_SESSION['y'];
    $isCorrect = $answer == $correct;
}

// 問題がセッションに保存されていない場合か問題に正解していた場合、新しい問題を生成
if ((isset($isCorrect) && $isCorrect === true) || !isset($_SESSION['x'], $_SESSION['y'])) {
    // 1~100のランダムな数字を2つ生成
    $x = $_SESSION['x'] = rand(1, 100);
    $y = $_SESSION['y'] = rand(1, 100);
} else {
    $x = $_SESSION['x'];
    $y = $_SESSION['y'];
}

?>

<?php if (isset($isCorrect)) { ?>
    <div><?= $isCorrect ? '正解です' : '不正解です' ?></div>
<?php } ?>

<form action="q12EX.php" method="post">
    <table>
        <tbody>
        <tr>
            <th>問題</th>
            <td><?= $x ?>+<?= $y ?></td>
        </tr>
        <tr>
            <th><label for="answer">答え</label></th>
            <td><input type="text" id="answer" name="answer"></td>
        </tr>
        </tbody>
    </table>

    <button type="submit">送信</button>
</form>
