<?php

/* --------------------------------------------------------------------------------------------------------- *
 * このファイルは[ループ処理(for文)]の問題です
 *
 * FizzBuzzを作ってみましょう
 *
 * FizzBuzzって？
 * https://ja.wikipedia.org/wiki/Fizz_Buzz
 * 一言で言うなら言葉遊びです
 *
 * プログラムを実行したら、
 * 1つずつ数字を出力していきますが、
 * 3の倍数の時は"Fizz"
 * 5の倍数の時は"Buzz"
 * 3の倍数でも、5の倍数でもある時は "FizzBuzz"
 * が数字の代わりに出力されるプログラムを書いてください
 * 例: 1, 2, Fizz, 4, Buzz, Fizz, 7, 8, Fizz, Buzz, 11, Fizz, 13, 14, FizzBuzz, 16, 17 ... Fizz, Buzz
 *
 * 数字は for を利用して 1-100 まで使ってください
 * 改行したい場合は <br> を使ってください
 * --------------------------------------------------------------------------------------------------------- */

for ($i = 1; $i <= 100; $i++) {
    if ($i % 15 == 0) {
        echo 'FizzBuzz';
    } else if($i % 3 == 0) {
        echo 'Fizz';
    } else if($i % 5 == 0) {
        echo 'Buzz';
    } else {
        echo $i;
    }

    echo '<br>';
}