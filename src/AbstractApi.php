<?php
/**
 * @link http://www.ipaya.cn/
 * @copyright Copyright (c) 2018 ipaya.cn
 */

namespace iPaya\AbstractSdk;


use GuzzleHttp\Client;
use Psr\Http\Message\UriInterface;

abstract class AbstractApi
{
    /**
     * @var AbstractClient
     */
    protected $client;
    /**
     * @var array
     */
    protected $httpClientConfig = [];

    /**
     * AbstractApi constructor.
     * @param AbstractClient $client
     * @param array $httpClientConfig
     */
    public function __construct(AbstractClient $client, $httpClientConfig = [])
    {
        $this->client = $client;
        $this->httpClientConfig = $httpClientConfig;
    }

    /**
     * @var Client
     */
    private $_httpClient;

    /**
     * @return Client
     */
    public function getHttpClient()
    {
        if ($this->_httpClient == null) {
            $this->_httpClient = new Client($this->httpClientConfig);
        }
        return $this->_httpClient;
    }

    /**
     * @param string|UriInterface $uri
     * @param array $options
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function get($uri, $options = [])
    {
        return $this->getHttpClient()->get($uri, $options);
    }

    /**
     * @param string|UriInterface $uri
     * @param array $options
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function post($uri, $options = [])
    {
        return $this->getHttpClient()->post($uri, $options);
    }
}
