<?php


namespace ChenDingtalk\Clients;

/**
 * Class AuthClient
 * @package ChenDingtalk\Clients
 */
class AuthClient extends AbstractClient
{
    /**
     * 获取 accessToken
     * @return string
     * @see https://open-doc.dingtalk.com/microapp/serverapi2/eev437
     */
    public function getAccessToken()
    {
        $key = 'access_token.' . $this->config['app_key'];
        $access_token = cache_get($key);
        if (!$access_token) {
            $params = ['appkey' => $this->config['app_key'], 'appsecret' => $this->config['app_secret']];
            $response = $this->executeGet('gettoken', $params);
            $access_token = $response->access_token;
            cache_set($key, $response->access_token, $response->expires_in);
        }

        return $access_token;
    }

    /**
     * 获取通讯录权限范围
     * @return \stdClass
     * @see https://open-doc.dingtalk.com/microapp/serverapi2/vt6v7m
     */
    public function scopes()
    {
        return $this->executeGet('auth/scopes');
    }
}