<?php

declare (strict_types=1);

namespace Hcg\Aes;

/**
 * AES对称加密解密工具类
 *
 * @author hcg
 * @email 532508307@qq.com
 */
class Aes
{
    protected $key;
    protected $iv;

    public function __construct($config = [])
    {
        foreach($config as $k => $v){
            $this->$k = $v;
        }
        if(empty($this->iv)){

        }
    }

    // 加密
    public function encrypt($data){
       return openssl_encrypt($data, 'aes-256-cbc', base64_decode($this->key), OPENSSL_RAW_DATA, base64_decode($this->iv));
    }

    // 解密
    public function decrypt($data){
        return openssl_decrypt($data, 'aes-256-cbc', base64_decode($this->key), OPENSSL_RAW_DATA, base64_decode($this->iv));
    }


}
