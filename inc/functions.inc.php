<?php

function is_post_request()
{
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function has_length_greater_than($value, $min)
{
    $length = strlen($value);
    return $length > $min;
}
