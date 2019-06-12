<?php

/**
 * @param int $length
 * @return string
 */
function random_string($length = 16)
{
    $str = "";
    $str_pol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
    $max = strlen($str_pol) - 1;
    for ($i = 0; $i < $length; $i++) {
        $str .= $str_pol[mt_rand(0, $max)];
    }
    return $str;
}

/**
 * @param $key
 * @param null $default
 * @return mixed|null
 */
function cache_get($key, $default = null)
{
    $file = cache_get_file($key);
    if (!is_file($file)) {
        return $default;
    }

    $value = file_get_contents($file);
    list($lifetime, $serializeData) = explode(PHP_EOL, $value);

    if ($lifetime == 0 || $lifetime > time()) {
        return unserialize($serializeData);
    }

    @unlink($file);

    return $default;
}

/**
 * @param $key
 * @param $data
 * @param int $expireAt
 * @return bool|int
 */
function cache_set($key, $data, $expireAt = 0)
{
    $file = cache_get_file($key);
    $lifetime = $expireAt ? (time() + $expireAt) : 0;
    return file_put_contents($file, $lifetime . PHP_EOL . serialize($data));
}

/**
 * @param $key
 * @return string
 */
function cache_get_file($key)
{
    $directory = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'dingtalk-cache' . DIRECTORY_SEPARATOR;
    if (!is_dir($directory)) {
        mkdir($directory);
    }

    $hash = str_replace('/', '-', base64_encode(hash('md5', $key, true)));

    return $directory . $hash;
}