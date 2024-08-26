<?php

/* ------------------------------------------------ *
 * このファイルは[関数 (function)]の問題です
 *
 * 引数に与えられた配列から偶数のみにした配列を返す関数
 * 引数に与えられた配列から奇数のみにした配列を返す関数
 *
 * この2つの関数をそれぞれ作成してください
 * ------------------------------------------------ */

/* ------------------------------------------------ *
 * 偶数のみにした配列を返す
 * ------------------------------------------------ */
function even($numbers)
{
    return $numbers;
}

/* ------------------------------------------------ *
 * 奇数のみにした配列を返す
 * ------------------------------------------------ */
function odd($numbers)
{
    return $numbers;
}

$numbers = [ 5, 6, 25, 26, 35, 67, 68, 72, 82, 85 ];

echo "元の配列: [" . implode(', ', $numbers) . "]<br>";
echo "偶数のみ: [" . implode(', ', even($numbers)) . "]<br>";
echo "奇数のみ: [" . implode(', ', odd($numbers)) . "]<br>";