<?php

/* ------------------------------------------------------------------------------------ *
 * このファイルは[ユーザから送信された値を処理する]の問題です
 *
 * 送信されたユーザID(user_id)とパスワード(password)を元に
 * 1. $users配列にユーザが存在し、パスワードがあっていれば「ようこそ <ユーザ名>さん」と出力
 * 2. それ以外の場合は「ユーザIDかパスワードが間違っています」と出力
 * するプログラムを作成してください
 *
 * $users配列のキー(添字)はユーザIDとなっています
 * ------------------------------------------------------------------------------------ */

$users = ['1' => ['user_id' => '1', 'name' => '武田', 'password' => 'password01'], '2' => ['user_id' => '2', 'name' => '久保', 'password' => 'password02'], '3' => ['user_id' => '3', 'name' => '加藤', 'password' => 'password03'], '4' => ['user_id' => '4', 'name' => '池田', 'password' => 'password04'], '5' => ['user_id' => '5', 'name' => '太田', 'password' => 'password05'], '6' => ['user_id' => '6', 'name' => '松田', 'password' => 'password06'], '7' => ['user_id' => '7', 'name' => '今井', 'password' => 'password07'], '8' => ['user_id' => '8', 'name' => '田村', 'password' => 'password08'], '9' => ['user_id' => '9', 'name' => '森', 'password' => 'password09'], '10' => ['user_id' => '10', 'name' => '木下', 'password' => 'password10'], '11' => ['user_id' => '11', 'name' => '井上', 'password' => 'password11'], '12' => ['user_id' => '12', 'name' => '酒井', 'password' => 'password12'], '13' => ['user_id' => '13', 'name' => '杉山', 'password' => 'password13'], '14' => ['user_id' => '14', 'name' => '横山', 'password' => 'password14'], '15' => ['user_id' => '15', 'name' => '藤原', 'password' => 'password15'], '16' => ['user_id' => '16', 'name' => '小林', 'password' => 'password16'], '17' => ['user_id' => '17', 'name' => '大塚', 'password' => 'password17'], '18' => ['user_id' => '18', 'name' => '藤井', 'password' => 'password18'], '19' => ['user_id' => '19', 'name' => '近藤', 'password' => 'password19'], '20' => ['user_id' => '20', 'name' => '原田', 'password' => 'password20'], '21' => ['user_id' => '21', 'name' => '酒井', 'password' => 'password21'], '22' => ['user_id' => '22', 'name' => '大野', 'password' => 'password22'], '23' => ['user_id' => '23', 'name' => '原田', 'password' => 'password23'], '24' => ['user_id' => '24', 'name' => '林', 'password' => 'password24'], '25' => ['user_id' => '25', 'name' => '石田', 'password' => 'password25'], '26' => ['user_id' => '26', 'name' => '岡本', 'password' => 'password26'], '27' => ['user_id' => '27', 'name' => '千葉', 'password' => 'password27'], '28' => ['user_id' => '28', 'name' => '村田', 'password' => 'password28'], '29' => ['user_id' => '29', 'name' => '渡辺', 'password' => 'password29'], '30' => ['user_id' => '30', 'name' => '山田', 'password' => 'password30']];

?>

<form action="q10.php" method="post">
    <table>
        <tbody>
        <tr>
            <th><label for="user_id">ユーザID</label></th>
            <td><input type="text" id="user_id" name="user_id"></td>
        </tr>
        <tr>
            <th><label for="password">パスワード</label></th>
            <td><input type="password" id="password" name="password"></td>
        </tr>
        </tbody>
    </table>
    <button type="submit">ログイン</button>
</form>
