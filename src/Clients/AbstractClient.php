<?php

namespace ChenDingtalk\Clients;

use ChenDingtalk\DingtalkManager;
use ChenDingtalk\DingtalkException;
use GuzzleHttp\Client as HttpClient;

/**
 * Class AbstractClient
 * @package ChenDingtalk\Clients
 */
abstract class AbstractClient
{
    /**
     * Dingtalk config
     * @var array
     */
    protected $config;

    /**
     * @var DingtalkManager
     */
    protected $dingtalkManager;

    /**
     * @var HttpClient
     */
    protected $httpClient;

    /**
     * @var string
     */
    protected $httpBaseUrl = 'https://oapi.dingtalk.com/';

    /**
     * @var array
     */
    protected $noNeedAccessTokenPaths = ['gettoken'];

    /**
     * AbstractClient constructor.
     * @param DingtalkManager $dingtalkManager
     * @param HttpClient $httpClient
     * @param $config
     */
    public function __construct(DingtalkManager $dingtalkManager, HttpClient $httpClient, $config)
    {
        $this->dingtalkManager = $dingtalkManager;
        $this->httpClient = $httpClient;
        $this->config = $config;
    }

    /**
     * Execute get method
     *
     * @param $path
     * @param $params
     * @return \stdClass
     */
    protected function executeGet($path, $params = [])
    {
        return $this->execute('get', $path, $params);
    }

    /**
     * Execute post method
     *
     * @param $path
     * @param $params
     * @param $files
     * @return \stdClass
     */
    protected function executePost($path, $params = [], $files = null)
    {
        return $this->execute('post', $path, $params, $files);
    }

    /**
     * Execute api
     *
     * @param $method
     * @param $path
     * @param array $params
     * @return \stdClass
     */
    /**
     * Execute api
     *
     * @param $method
     * @param $path
     * @param array $params
     * @return \stdClass
     */
    protected function execute($method, $path, $params = [], $files = null)
    {
        $uri = $this->httpBaseUrl . $path;
        foreach ($params as $key => $param) {
            if (is_null($param)) unset($params[$key]);
        }
        $params['signature'] = $this->signature();
        if ($method == 'get') {
            if (!in_array($path, $this->noNeedAccessTokenPaths)) {
                $params['access_token'] = $this->accessToken();
            }
            $uri .= '?' . http_build_query($params);
            $res = $this->httpClient->get($uri);
        } elseif ($method == 'post') {
            if (!in_array($path, $this->noNeedAccessTokenPaths)) {
                $uri .= '?access_token=' . $this->accessToken();
            }

            if ($files) {
                $uri .= '&' . http_build_query($params);
                $files = is_string($files) ? [$files] : $files;
                $multipart = [];
                foreach ($files as $file) {
                    if (is_file($file)) {
                        $multipart[] = [
                            'name' => 'file',
                            'contents' => fopen($file, 'r'),
                        ];
                    } elseif (is_string($file)) {
                        $multipart[] = [
                            'name' => 'file',
                            'contents' => $file,
                        ];
                    } elseif (is_array($file)) {
                        $multipart[] = $file;
                    }
                }
                $data['multipart'] = $multipart;
            } else {
                $data['json'] = $params;
            }

            $res = $this->httpClient->post($uri, $data);
        } else {
            throw new DingtalkException('Dingtalk not support method!');
        }

        $body = $res->getBody();

        $response = json_decode($body);

        if ($response->errcode !== 0) {
            throw new DingtalkException($response->errmsg, $response->errcode);
        }

        return $response;
    }

    /**
     * Generate signature
     *
     * @return string
     */
    private function signature()
    {
        $timestamp = round(microtime(true), 3) * 1000;
        return base64_encode(hash_hmac('sha256', $timestamp, $this->config['app_secret'], true));
    }

    /**
     * Get accessToken
     *
     * @return string
     */
    private function accessToken()
    {
        return $this->dingtalkManager->auth()->getAccessToken();
    }
}