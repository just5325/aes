<?php

require_once './vendor/autoload.php';

use Hcg\Aes\Aes as Aes;

// 实例化
//$aes = new Aes(['key' => base64_encode(md5('12345')), 'iv' => base64_encode(openssl_random_pseudo_bytes(16))]);
$aes = new Aes(['key' => base64_encode(md5('12345')), 'iv' => base64_encode('1111111111222222')]);

$encrypted = $aes->encrypt('12345');
echo '加密: '.base64_encode($encrypted)."\n";

$decrypted = $aes->decrypt($encrypted);
echo '解密: '.$decrypted."\n";
die;