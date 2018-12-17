# telegram-bot-api

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

## Structure

If any of the following are applicable to your project, then the directory structure should follow industry best practices by being named the following.

```
bin/        
config/
src/
tests/
vendor/
```


## Install

Via Composer

``` bash
$ composer require greenplugin/telegram-bot-api
```

## Usage

``` php
$skeleton = new Greenplugin\TelegramBot();
echo $skeleton->echoPhrase('Hello, League!');
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email wformps@gmail.com instead of using the issue tracker.

## Credits

- [Greenplugin][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/greenplugin/telegram-bot-api.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/greenplugin/telegram-bot-api/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/greenplugin/telegram-bot-api.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/greenplugin/telegram-bot-api.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/greenplugin/telegram-bot-api.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/greenplugin/telegram-bot-api
[link-travis]: https://travis-ci.org/greenplugin/telegram-bot-api
[link-scrutinizer]: https://scrutinizer-ci.com/g/greenplugin/telegram-bot-api/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/greenplugin/telegram-bot-api
[link-downloads]: https://packagist.org/packages/greenplugin/telegram-bot-api
[link-author]: https://github.com/greenplugin
[link-contributors]: ../../contributors
