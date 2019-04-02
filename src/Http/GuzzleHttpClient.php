<?php declare(strict_types=1);

namespace Ymbra\Acrelianews\Http;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Ymbra\Acrelianews\AcrelianewsException;

/**
 * Guzzle Http Client.
 *
 * @package Ymbra\Acrelianews
 */
class GuzzleHttpClient implements HttpClientInterface
{
    /**
     * @var Client
     */
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function handleRequest(string $method, string $uri = '', array $options = []): string
    {
        try {
            $response = $this->client->request($method, $uri, $options);

            return $response->getBody()->getContents();
        } catch (RequestException $e) {
            throw new AcrelianewsException($e->getMessage(), $e->getCode(), $e);
        }
    }
}
