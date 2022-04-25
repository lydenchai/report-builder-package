# HTML Page Builder

In your Laravel application -> `composer.json` file

```
    {
        "require": {
            "report-builder/page-builder": "^1.0.0"
        }
        "repositories": [
            {
                "type": "vcs",
                "url": "https://git2.poscarcloud.com/laravel-trainee/report-builder"
            }
        ],
    }
```

## Install

To install through Composer, by run the following command:

```
composer require report-builder/page-builder
```

The package will automatically register itself.

Add the following to the `providers` array in `config/app.php`. This provider must be **registered as the last service provider** on the `providers` array:

```
WebsiteBuilder\PageBuilder\ReportButilderServiceProvider::class,
WebsiteBuilder\PageBuilder\RouteServiceProvider::class,
```

You can publish the migration with:

```
php artisan vendor:publish --provider="ReportBuilder\\PageBuilder\\ReportButilderServiceProvider" --tag='migrations'
```

After publishing the migration you can create the page table by running the migrations:

```
php artisan migrate
```

Optionally, publish the package's configuration file by running:

```
php artisan vendor:publish --provider="ReportBuilder\\PageBuilder\\ReportButilderServiceProvider"
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
