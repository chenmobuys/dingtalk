<?php

namespace ChenDingtalk\Crypto;

use Exception;
use ChenDingtalk\DingtalkException;

class Prpcrypt
{
    public $key;
    public $iv;

    public function __construct($k)
    {
        $this->key = base64_decode($k . "=");
        $this->iv = substr($this->key, 0, 16);
    }

    public function encrypt($text, $corpid)
    {
        try {
            //获得16位随机字符串，填充到明文之前
            $random = random_string();
            $text = $random . pack("N", strlen($text)) . $text . $corpid;
            //使用自定义的填充方式对明文进行补位填充
            $pkc_encoder = new PKCS7Encoder;
            $text = $pkc_encoder->encode($text);

            //加密
            $options = OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING;
            $encrypted = openssl_encrypt($text, 'AES-256-CBC', $this->key, $options, $this->iv);

            //print(base64_encode($encrypted));
            //使用BASE64对加密后的字符串进行编码
            return [ErrorCode::$OK, base64_encode($encrypted)];
        } catch (Exception $e) {
            return [ErrorCode::$EncryptAESError, null];
        }
    }

    public function decrypt($encrypted, $corpid)
    {
        try {
            $data = base64_decode($encrypted);
            $options = OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING;
            $decrypted = openssl_decrypt($data, 'AES-256-CBC', $this->key, $options, $this->iv);

            if (!$decrypted) {
                throw new DingtalkException(openssl_error_string());
            }
        } catch (DingtalkException $e) {
            return [ErrorCode::$DecryptAESError, null];
        }

        try {
            //去除补位字符
            $pkc_encoder = new PKCS7Encoder;
            $result = $pkc_encoder->decode($decrypted);
            //去除16位随机字符串,网络字节序和AppId
            if (strlen($result) < 16)
                return "";
            $content = substr($result, 16, strlen($result));
            $len_list = unpack("N", substr($content, 0, 4));
            $xml_len = $len_list[1];
            $xml_content = substr($content, 4, $xml_len);
            $from_corpid = substr($content, $xml_len + 4);
        } catch (Exception $e) {
            return [ErrorCode::$DecryptAESError, null];
        }
        if ($from_corpid != $corpid) {
            return [ErrorCode::$ValidateSuiteKeyError, null];
        }

        return [ErrorCode::$OK, $xml_content];
    }
}