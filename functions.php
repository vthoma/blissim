<?php
declare(strict_types=1);

function dd($var): void
{
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
    die();
}
