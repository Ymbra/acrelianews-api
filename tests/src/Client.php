<?php

namespace Ymbra\Acrelianews\Tests;

/**
 * Test HTTP client.
 *
 * @package Ymbra\Acrelianews\Tests
 */
class Client
{
    /**
     * Request method.
     *
     * @var string $method
     */
    public $method;

    /**
     * Request uri.
     *
     * @var string $uri
     */
    public $uri;

    /**
     * Request options.
     *
     * @var array $options
     */
    public $options;

    /**
     * @inheritdoc
     */
    public function request($method, $uri = '', array $options = [])
    {
        $this->method = $method;
        $this->uri = $uri;
        $this->options = $options;

        return new Response();
    }
}
