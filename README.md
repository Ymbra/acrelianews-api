# Acrelianews PHP API V2

PHP library that provides client functions for Acrelianews's REST API v2.

Acrelianews API [docs](http://manager.acrelianews.com/api/v2/apidoc/)

## Requirements

* PHP 7.0 or higher
* [Composer](https://getcomposer.org/)

## Install

Via Composer

``` bash
$ composer require ymbra/acrelianews-api
```

## Example

#### Gets contact from list by email.
``` php
use Ymbra\Acrelianews\AcrelianewsContact;

$contactApi = new AcrelianewsContact('THE_API_KEY');

$listId = 1234;
$email = 'test@example.com';

$response = $contactApi->getByEmail($listId,  $email);

echo json_decode($response)->email_address;
```

## Testing

``` bash
$ vendor/bin/phpunit
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.


## License

Please see [License File](LICENSE) for more information.
