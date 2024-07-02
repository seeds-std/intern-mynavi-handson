<?php

for ($i = 1; $i <= 100; $i++) {
    // 配列の添字に計算式を用いることでFizzBuzzを実現できます
    $source = [
        0 => $i,
        $i % 3 => 'Fizz',
        $i % 5 => 'Buzz',
        $i % 15 => 'FizzBuzz',
    ];

    echo $source[0] . '<br>';
}
