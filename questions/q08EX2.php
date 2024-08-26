<?php

/* -------------------------------------------------------- *
 * このファイルは[関数 (function)]の問題です
 *
 * 配列の要素を昇順に並び替える関数を作ってください
 * ただし、ソート系のPHPの組み込み関数は利用してはいけません
 * https://www.php.net/manual/ja/array.sorting.php
 * -------------------------------------------------------- */

function sortArray($numbers)
{
    return $numbers;
}

$numbers = [3, 7, 1, 9, 2, 4, 6, 10, 5, 8];

echo "ソート前: [" . implode(', ', $numbers) . "]<br>";
echo "ソート後: [" . implode(', ', sortArray($numbers)) . "]<br>";
