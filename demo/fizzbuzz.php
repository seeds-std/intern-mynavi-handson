<?php
for($i = 1; $i <= 100; $i++) {
    echo [0 => $i, $i % 3 => 'Fizz', $i % 5 => 'Buzz', $i % 15 => 'FizzBuzz'][0] . '<br>';
}
