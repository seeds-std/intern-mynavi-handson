<?php

/* -------------------------------------------- *
 * このファイルは[条件分岐(if文)]の問題です
 *
 * $numberの値を 1 から 10 に変更していった場合、
 * それぞれどの文字列が出力されるでしょう
 * 予想してから実行してください
 *
 * [答え]
 *  1: else
 *  2: else if
 *  3: else
 *  4: else if
 *  5: else
 *  6: else
 *  7: else
 *  8: if
 *  9: if
 * 10: if
 * -------------------------------------------- */

$number = 0;
if ($number > 7) {
    echo "if";
} else if ($number <= 4 && $number % 2 === 0) {
    echo "else if";
} else {
    echo "else";
}
