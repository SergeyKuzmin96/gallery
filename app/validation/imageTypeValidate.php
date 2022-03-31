<?php

function imageTypeValidate($type): bool
{
    $types = array('image/gif', 'image/png', 'image/jpeg');
    if (in_array($type, $types)) {
        return true;
    }
    return false;
}