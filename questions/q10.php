<?php

/* ------------------------------------------------------------------------------------ *
 * このファイルは[ユーザから送信された値を処理する]の問題です
 *
 * 値が送信されていた場合、その値を出力するプログラムを書いてください
 * ------------------------------------------------------------------------------------ */

if (isset($_POST['name'])) {
    echo '送信された値: ' .htmlspecialchars($_POST['name']) . '<br>';
}
?>

<form action="q10.php" method="post">
    <table>
        <tbody>
        <tr>
            <th><label for="name">名前</label></th>
            <td><input type="text" id="name" name="name"></td>
        </tr>
        </tbody>
    </table>
    <button type="submit">送信</button>
</form>
