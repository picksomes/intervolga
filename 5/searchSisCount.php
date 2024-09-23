<?php

function countSisters(int $n, int $m): int
{

    if ($n < 0 || $m < 0) {

        echo 'Значения аргументов < 0 !!!';
        die();

    }

    return $n + 1;

}

echo countSisters(-1, 0);
