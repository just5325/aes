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
    protected $method = 'aes-256-cbc';

    public function __construct($config = [])
    {
        foreach($config as $k => $v){
            $this->$k = $v;
        }
        if(empty($this->iv)){
            $this->setIv(base64_encode(openssl_random_pseudo_bytes(16)));
        }
    }

    public function setIv($iv): Aes
    {
        $this->iv = $iv;
        return $this;
    }

    public function getIv(){
        return $this->iv;
    }

    // 加密
    public function encrypt($data)
    {
        return openssl_encrypt($data, $this->method, base64_decode($this->key), OPENSSL_RAW_DATA, base64_decode($this->iv));
    }

    // 解密
    public function decrypt($data)
    {
        return openssl_decrypt($data, $this->method, base64_decode($this->key), OPENSSL_RAW_DATA, base64_decode($this->iv));
    }

}
