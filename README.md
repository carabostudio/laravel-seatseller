Laravel Seatseller
==============

Laravel Searseller was created by, and is maintained by [Axay Gadekar](https://github.com/itsaxay), and is a wrapper package for [Seatseller](http://seatseller.travel) api.

![Banner]()

## Installation

Laravel Seatseller requires [PHP](https://php.net) 7.4. This particular version supports Laravel 7.11.0.

To get the latest version, simply require the project using [Composer](https://getcomposer.org):

```bash
$ composer require carabostudio/laravel-seatseller
```

Once installed, if you are not using automatic package discovery, then you need to register the  `Carabostudio\Seatseller\SeatsellerServiceProvider` service provider in your `config/app.php`.

You can also optionally alias our facade:

```php
 'Seatseller' => Carabostudio\Seatseller\Facades\Seatseller::class,
```


## Configuration

Laravel Seatseller requires connection configuration.

To get started, you'll need to publish all vendor assets:

```bash
$ php artisan vendor:publish
```

This will create a `config/seatseller.php` file in your app that you can modify to set your configuration. Also, make sure you check for changes to the original config file in this package between releases.

There are two config options:

##### Seatseller environment

This option (`'environment'`) is where you may specify which of the environment you wish to use as your environment for all work. These will use below credentials for all the work as per environment. The default value for this setting is `'dev'`.

##### Seatseller environment

This option (`'credentials'`) is where each of the credentials used for your application. Package will use credentials as per environment.

##### Further Information

You can see wiki for the package [here]().

## Security

If you discover a security vulnerability within this package, please send an email to Axay Gadekar at axayhg@gmail.com. All security vulnerabilities will be promptly addressed. You may view our full security policy [here](https://github.com/carabostudio/laravel-seatseller/security/policy).


## License

Laravel Seatseller is licensed under [The MIT License (MIT)](LICENSE).
