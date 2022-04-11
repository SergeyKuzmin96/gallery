<?php

function clearData($data): array
{
    $attributes = null;
    foreach ($data as $key => $value) {
        $value = trim($value);
        $value = stripslashes($value);
        $value = strip_tags($value);
        $attributes["$key"] = htmlspecialchars($value);
    }
    return $attributes;
}