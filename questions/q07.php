<?php

/* ------------------------------------------------------------------------------------ *
 * このファイルは[配列のループ処理 (foreach)]の問題です
 *
 * $users の中身をループ処理し、各ユーザの
 * - 名前(name)
 * - 性別(sex)
 * - テーマ色(theme_color)
 * を出力するプログラムを作成してください
 *
 * 名前以外はデータがない場合がありますので、データがない場合は「データなし」と出力してください
 * ------------------------------------------------------------------------------------ */

$users = [['name' => '原', 'sex' => '男性', 'theme_color' => '銀'], ['name' => '山本', 'sex' => '女性', 'theme_color' => 'ターコイズブルー'], ['name' => '藤田', 'sex' => '男性', 'theme_color' => 'サーモン'], ['name' => '山口', 'sex' => '女性', 'theme_color' => '銀'], ['name' => '山崎', 'sex' => 'その他', 'theme_color' => 'サーモン'], ['name' => '野村', 'theme_color' => 'シアン'], ['name' => '杉山', 'sex' => '女性'], ['name' => '西村', 'sex' => '男性', 'theme_color' => '灰色'], ['name' => '清水', 'theme_color' => 'プラム'], ['name' => '佐々木', 'sex' => '男性', 'theme_color' => 'ライム'], ['name' => '杉山', 'theme_color' => '金'], ['name' => '松本', 'theme_color' => '黄'], ['name' => '松本', 'sex' => 'その他'], ['name' => '森', 'sex' => '女性'], ['name' => '藤田', 'sex' => '女性', 'theme_color' => '青'], ['name' => '原田', 'sex' => '女性', 'theme_color' => 'オーキッド'], ['name' => '藤田', 'sex' => '男性'], ['name' => '内田', 'sex' => 'その他', 'theme_color' => 'プラム'], ['name' => '後藤', 'sex' => '男性'], ['name' => '野口', 'sex' => '男性'], ['name' => '平野', 'sex' => '女性'], ['name' => '大塚', 'sex' => '男性', 'theme_color' => '黒'], ['name' => '田村', 'theme_color' => 'ティール'], ['name' => '後藤', 'sex' => '男性', 'theme_color' => 'ターコイズブルー'], ['name' => '中川', 'sex' => 'その他', 'theme_color' => 'ピンク'], ['name' => '森田', 'sex' => '男性', 'theme_color' => 'バイオレット'], ['name' => '宮崎', 'theme_color' => '緑'], ['name' => '中村', 'sex' => '女性', 'theme_color' => 'ライム'], ['name' => '柴田', 'sex' => '女性', 'theme_color' => 'ターコイズブルー'], ['name' => '小野', 'sex' => '女性', 'theme_color' => '黄']];

// 通常の出力
foreach ($users as $user) {
    echo '名前: ' . $user['name'] . '<br>';
    echo '性別: ' . ($user['sex'] ?? 'データなし') . '<br>';
    echo 'テーマ色: ' . ($user['theme_color'] ?? 'データなし') . '<br>';
    echo '<br>';
}
?>

<!-- テーブル形式で出力 -->
<table border="1">
    <thead>
    <tr>
        <th>名前</th>
        <th>性別</th>
        <th>テーマ色</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user) { ?>
        <tr>
            <td><?= $user['name'] ?></td>
            <td><?= $user['sex'] ?? 'データなし' ?></td>
            <td><?= $user['theme_color'] ?? 'データなし' ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>