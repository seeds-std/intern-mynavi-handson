<?php

/* ------------------------------------------------ *
 * このファイルは[関数 (function)]の問題です
 *
 * $name 引数に与えられた値を利用して
 * こんにちは $name さん
 * を返す関数を作成してください
 * ------------------------------------------------ */

function greeting($name)
{
    return 'こんにちは ' . $name . ' さん';
}

$result = greeting('名前');

echo $result;
