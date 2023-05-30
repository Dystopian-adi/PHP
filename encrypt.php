<?php
//$key should have been previously generated in a cryptographically safe way, like openssl_random_pseudo_bytes
$key = "lasun707isadi";
$plaintext = "there is only one person in the world i loved";
$cipher = "aes-128-gcm";
if (in_array($cipher, openssl_get_cipher_methods()))
{
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = openssl_random_pseudo_bytes($ivlen);
    $ciphertext = openssl_encrypt($plaintext, $cipher, $key, $options=0, $iv, $tag);
    echo $ciphertext."\n";die();
    //store $cipher, $iv, and $tag for decryption later
    // $original_plaintext = openssl_decrypt($ciphertext, $cipher, $key, $options=0, $iv, $tag);
    // echo $original_plaintext."\n";
}
?>