<?php

/* -------------------------------------------- *
 * このファイルは[演算子]の問題です
 *
 * $a と $b の値は変更してもOKです
 * -------------------------------------------- */
$a = 17;
$b = 3;

/* -------------------------------------------- *
 * $a と $b の値を足した結果を代入してください
 * -------------------------------------------- */
$add = 0;

/* -------------------------------------------- *
 * $a から $b の値を引いた結果を代入してください
 * -------------------------------------------- */
$subtract = 0;

/* -------------------------------------------- *
 * $a と $b の値を掛けた結果を代入してください
 * -------------------------------------------- */
$multiply = 0;

/* -------------------------------------------- *
 * $a を $b の値で割った結果を代入してください
 * -------------------------------------------- */
$divide = 0;

/* -------------------------------------------- *
 * $a を $b の値で割ったあまりを代入してください
 * -------------------------------------------- */
$remainder = 0;

?>

<h2><?= $a ?> と <?= $b ?> の計算結果</h2>
<table>
    <tr>
        <th>足し算</th>
        <td><?= $add ?></td>
    </tr>
    <tr>
        <th>引き算</th>
        <td><?= $subtract ?></td>
    </tr>
    <tr>
        <th>掛け算</th>
        <td><?= $multiply ?></td>
    </tr>
    <tr>
        <th>割り算</th>
        <td><?= $divide ?></td>
    </tr>
    <tr>
        <th>割り算の余り</th>
        <td><?= $remainder ?></td>
    </tr>
</table>
