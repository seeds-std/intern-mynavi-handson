<?php

/* -------------------------------------------- *
 * このファイルは[条件分岐(if文)]の問題です
 *
 * $numberの値を 1 から 10 に変更していった場合、
 * それぞれどの文字列が出力されるでしょう
 * 予想してから実行してください
 *
 * [予想]
 *  1:
 *  2:
 *  3:
 *  4:
 *  5:
 *  6:
 *  7:
 *  8:
 *  9:
 * 10:
 * -------------------------------------------- */

$number = 0;
if ($number > 7) {
    echo "if";
} else if ($number <= 4 && $number % 2 === 0) {
    echo "else if";
} else {
    echo "else";
}
