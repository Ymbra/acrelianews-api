<?php declare(strict_types=1);

namespace Ymbra\Acrelianews;

use Ymbra\Acrelianews\Http\HttpClientInterface;

/**
 * Acrelianews library.
 *
 * @package Ymbra\Acrelianews
 */
class Acrelianews
{
    /**
     * The HTTP client.
     * @var HttpClientInterface
     */
    protected $client;

    /**
     * The REST API endpoint.
     * @var string
     */
    protected $endpoint = 'http://manager.acrelianews.com/api/v2';

    /**
     * The Acrelianews API key to authentication.
     * @var string
     */
    private $apiKey;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
        $this->client = new Http\GuzzleHttpClient();
    }


    public function getClient(): HttpClientInterface
    {
        return $this->client;
    }

    public function getEndpoint(): string
    {
        return $this->endpoint;
    }

    /**
     * Sends request to the Acrelianews API.
     * @throws \Exception
     */
    public function request(string $method, string $path, array $tokens = null, array $params = []): string
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

        return $this->client->handleRequest($method, $uri, $options);
    }

    public function setClient(HttpClientInterface $client): void
    {
        $this->client = $client;
    }
}
