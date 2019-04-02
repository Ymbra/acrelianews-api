<?php declare(strict_types=1);

namespace Ymbra\Acrelianews\Tests\Http;

use Ymbra\Acrelianews\Http\HttpClientInterface;

/**
 * Dummy Http Client.
 *
 * @package Ymbra\Acrelianews\Tests
 */
class DummyHttpClient implements HttpClientInterface
{
    /**
     * The request method.
     * @var string
     */
    public $method;
    /**
     * The request uri.
     * @var string
     */
    public $uri;
    /**
     * The request options.
     * @var string[]
     */
    public $options;

    public function handleRequest(string $method, string $uri = '', array $options = []): string
    {
        $this->method = $method;
        $this->uri = $uri;
        $this->options = $options;

        return '{}';
    }
}
