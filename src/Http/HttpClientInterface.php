<?php declare(strict_types=1);

namespace Ymbra\Acrelianews\Http;

/**
 * Http Client interface.
 *
 * @package Ymbra\Acrelianews
 */
interface HttpClientInterface
{
    /**
     * Makes request to Acrelianews API.
     * @param string[] $options
     * @throws \Exception
     */
    public function handleRequest(string $method, string $uri = '', array $options = []): string;
}
