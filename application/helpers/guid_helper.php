<?php

function guid() {
    // Microsoft guid {xxxxxxxx-xxxx-Mxxx-Nxxx-xxxxxxxxxxxx}
    if (function_exists('com_create_guid') === true)
    {
        return trim(com_create_guid(), '{}');
    }

    $data = openssl_random_pseudo_bytes(16);

    // set version to 0100
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);

    // set bits 6-7 to 10
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }

