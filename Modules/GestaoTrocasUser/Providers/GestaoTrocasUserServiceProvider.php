<?php

namespace GestaoTrocasUser\Providers;

use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Doctrine\Common\Annotations\CachedReader;
use Doctrine\Common\Cache\FilesystemCache;
use GestaoTrocasUser\Annotations\Mapping\Controller;
use GestaoTrocasUser\Annotations\PermissionReader;
use GestaoTrocasUser\Http\Controllers\UsersController;
use GestaoTrocasUser\Providers\RouteServiceProvider;
use Illuminate\Support\ServiceProvider;
use Doctrine\Common\Annotations\Reader;

class GestaoTrocasUserServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->publishMigrationsAndSeeders();

        /** @var PermissionReader $reader */
        $reader = app(PermissionReader::class);
        $reader->getPermissions();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(\Jrean\UserVerification\UserVerificationServiceProvider::class);
        $this->app->register(RepositoryServiceProvider::class);
        $this->app->register(RouteServiceProvider::class);
        $this->app->register(AuthServiceProvider::class);
        $this->registerAnnotations();
        $this->app->bind(Reader::class, function () {
            return new CachedReader(
                new AnnotationReader(),
                new FilesystemCache(storage_path('framework/cache/doctrine-annotations')),
                $debug = env('APP_DEBUG')
            );
        });
    }

    protected function registerAnnotations()
    {
        $loader = require __DIR__.'/../../../vendor/autoload.php';
        AnnotationRegistry::registerLoader([$loader, 'loadClass']);
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            __DIR__.'/../Config/config.php' => config_path('gestaotrocasuser.php'),
        ], 'config');
        $this->mergeConfigFrom(
            __DIR__.'/../Config/config.php', 'gestaotrocasuser'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = base_path('resources/views/modules/gestaotrocasuser');

        $sourcePath = __DIR__.'/../resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ]);

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/gestaotrocasuser';
        }, \Config::get('view.paths')), [$sourcePath]), 'gestaotrocasuser');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = base_path('resources/lang/modules/gestaotrocasuser');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'gestaotrocasuser');
        } else {
            $this->loadTranslationsFrom(__DIR__ .'/../resources/lang', 'gestaotrocasuser');
        }
    }

    public function publishMigrationsAndSeeders()
    {
        $sourcePath = __DIR__.'/../database/migrations';

        $this->publishes([
            $sourcePath => database_path('migrations')
        ], 'migrations');

        $sourcePath = __DIR__.'/../database/seeders';

        $this->publishes([
            $sourcePath => database_path('seeds')
        ], 'seeders');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}