<?php

namespace Ymbra\Acrelianews;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Ymbra\Acrelianews\AcrelianewsException;

/**
 * Acrelianews library.
 *
 * @package Ymbra\Acrelianews
 */
class Acrelianews
{
    /**
     * The HTTP client.
     *
     * @var Client $client
     */
    protected $client;

    /**
     * The REST API endpoint.
     *
     * @var string $endpoint
     */
    protected $endpoint = 'http://manager.acrelianews.com/api/v2';

    /**
     * The Acrelianews API key to authentication.
     *
     * @var string $apiKey
     */
    private $apiKey;


    /**
     * Constructor.
     */
    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
        $this->client = new Client();
    }

    /**
     * Sends request to the Acrelianews API.
     */
    public function request($method, $path, $tokens = null, $params = [])
    {
        if ($tokens) {
            foreach ($tokens as $key => $value) {
                $path = str_replace('{' . $key . '}', $value, $path);
            }
        }

        $defaultParams = [
            'token' => $this->apiKey,
        ];
        $uri = $this->endpoint . $path;
        $options['query'] = array_merge($defaultParams, $params);

        try {
            $response = $this->client->request($method, $uri, $options);

            return json_decode($response->getBody());
        } catch (RequestException $e) {
            throw new AcrelianewsException($e->getMessage(), $e->getCode(), $e);
        }
    }
}
