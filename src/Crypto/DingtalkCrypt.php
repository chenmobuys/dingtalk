<?php

namespace ChenDingtalk\Crypto;


use ChenDingtalk\DingtalkException as Exception;

class DingtalkCrypt
{
    private $m_token;
    private $m_encodingAesKey;
    private $m_suiteKey;

    public function __construct($token, $encodingAesKey, $suiteKey)
    {
        $this->m_token = $token;
        $this->m_encodingAesKey = $encodingAesKey;
        $this->m_suiteKey = $suiteKey;
    }

    public function encryptMsg($plain, $timeStamp = null, $nonce = null)
    {
        $pc = new Prpcrypt($this->m_encodingAesKey);

        list($errorCode, $encrypt) = $pc->encrypt($plain, $this->m_suiteKey);

        if ($errorCode != ErrorCode::$OK) {
            return $errorCode;
        }

        if ($timeStamp == null) {
            $timeStamp = time();
        }

        if ($nonce == null) {
            $nonce = random_string(6);
        }

        list($errorCode, $signature) = $this->getSha1($this->m_token, $timeStamp, $nonce, $encrypt);

        if ($errorCode != ErrorCode::$OK) {
            return $errorCode;
        }

        $encryptMsg = json_encode([
            "msg_signature" => $signature,
            "encrypt" => $encrypt,
            "timeStamp" => $timeStamp,
            "nonce" => $nonce
        ]);

        return $encryptMsg;
    }

    public function decryptMsg($signature, $timeStamp, $nonce, $encrypt)
    {
        if (strlen($this->m_encodingAesKey) != 43) {
            return ErrorCode::$IllegalAesKey;
        }

        $pc = new Prpcrypt($this->m_encodingAesKey);

        if ($timeStamp == null) {
            $timeStamp = time();
        }

        list($errorCode, $verifySignature) = $this->getSha1($this->m_token, $timeStamp, $nonce, $encrypt);
        if ($errorCode != ErrorCode::$OK) {
            return $errorCode;
        }

        if ($verifySignature != $signature) {
            return ErrorCode::$ValidateSignatureError;
        }

        list($errorCode, $decryptMsg) = $pc->decrypt($encrypt, $this->m_suiteKey);

        $decryptMsg = json_decode($decryptMsg, true);

        if ($errorCode != ErrorCode::$OK) {
            return $errorCode;
        }

        return $decryptMsg;
    }

    private function getSha1($token, $timestamp, $nonce, $encrypt_msg)
    {
        try {
            $array = [$encrypt_msg, $token, $timestamp, $nonce];
            sort($array, SORT_STRING);
            $str = implode($array);
            return [ErrorCode::$OK, sha1($str)];
        } catch (Exception $e) {
            return [ErrorCode::$ComputeSignatureError, null];
        }
    }
}

