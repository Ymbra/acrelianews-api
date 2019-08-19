# Contributing

Contributions are **welcome** and are accepted via pull request.

## Guidelines

- Follow [PSR-2 Coding Standard](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md)

- Add tests.

- Open Pull Request on [Github](https://github.com/Ymbra/acrelianews-api).

## Running Tests

``` bash
$ vendor/bin/phpunit
```

## Coding Standards

Run PHP code sniffer to check:

``` bash
$ vendor/bin/phpcs --standard=PSR2 src tests
```

Run PHP code beautifier to fix it:

``` bash
$ vendor/bin/phpcbf --standard=PSR2 src tests
```
