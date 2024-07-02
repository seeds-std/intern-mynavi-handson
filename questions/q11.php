<?php

/* ---------------------------------------------------- *
 * このファイルは[Cookie]の問題です
 *
 * ユーザが最後に入力した名前をCookieに保存し、
 * 次回アクセス時に名前を自動入力されるようにしてください
 *
 * 保存期間は1週間となるようにしてください
 * ---------------------------------------------------- */

if (isset($_POST['name'])) {
    setcookie('name', $_POST['name'], time() + 60 * 60 * 24 * 7);

    // setcookie() で保存した値は $_COOKIE に直後には反映されないので、$_COOKIE にも入れる
    $_COOKIE['name'] = $_POST['name'];
}

?>

<form action="q11.php" method="post">
    <table>
        <tbody>
        <tr>
            <th><label for="name">名前</label></th>
            <td><input type="text" id="name" name="name" value="<?= $_COOKIE['name'] ?? '' ?>"></td>
        </tr>
        <tr>
            <th><label for="content">内容</label></th>
            <td><textarea id="content" name="content"></textarea></td>
        </tr>
        </tbody>
    </table>
    <button type="submit">送信</button>
</form>
