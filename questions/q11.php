<?php

/* ---------------------------------------------------- *
 * このファイルは[Cookie]の問題です
 *
 * ユーザが最後に入力した名前をCookieに保存し、
 * 次回アクセス時に名前を自動入力されるようにしてください
 *
 * 保存期間は1週間となるようにしてください
 * ---------------------------------------------------- */

?>

<form action="q11.php" method="post">
    <table>
        <tbody>
        <tr>
            <th><label for="name">名前</label></th>
            <td><input type="text" id="name" name="name" value="<?= 'ここを変更してください' ?>"></td>
        </tr>
        <tr>
            <th><label for="content">内容</label></th>
            <td><textarea id="content" name="content"></textarea></td>
        </tr>
        </tbody>
    </table>
    <button type="submit">送信</button>
</form>
