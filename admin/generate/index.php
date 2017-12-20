<?php

header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename=codes-' . date('d.m.Y-H.i') . '.csv');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');

for ($i=0; $i < (int) $_SERVER["QUERY_STRING"]; $i++) {
    print random_code() . PHP_EOL;
}

function random_code($length = 10)
{
    $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    $crypto_rand_secure = function ( $min, $max ) {
        $range = $max - $min;
        if ( $range < 0 ) return $min; // not so random...
        $log    = log( $range, 2 );
        $bytes  = (int) ( $log / 8 ) + 1; // length in bytes
        $bits   = (int) $log + 1; // length in bits
        $filter = (int) ( 1 << $bits ) - 1; // set all lower bits to 1
        do {
            $rnd = hexdec( bin2hex( openssl_random_pseudo_bytes( $bytes ) ) );
            $rnd = $rnd & $filter; // discard irrelevant bits
        } while ( $rnd >= $range );
        return $min + $rnd;
    };

    $token = "";

    for ($i = 0; $i < $length; $i++) {
        $token .= $pool[$crypto_rand_secure(0, strlen($pool))];
    }

    return $token;
}