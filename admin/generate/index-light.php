<?php

header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename=codes-' . date('d.m.Y-H.i') . '.csv');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');

$codes = array();

for ($i=0; $i < (int) $_SERVER["QUERY_STRING"]; $i++) {

    $codes[random_code()] = $i;
}

print implode(PHP_EOL, array_keys($codes));

function random_code($length = 6)
{
    $pool[0] = 'ABCDEFGHKLMNPRSTUVXYZ';
    $pool[1] = '123456789';

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

    for ($i = 1; $i <= $length; $i++) {

        $idx = (int) ($i % 2 > 0);

        $token .= $pool[$idx][$crypto_rand_secure(0, strlen($pool[$idx]))];
    }

    return $token;
}