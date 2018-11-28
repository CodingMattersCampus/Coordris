<?php

namespace Modules\Ngo\Providers;

use Illuminate\Events\Dispatcher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class NgoServiceProvider extends ServiceProvider
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
    public function boot(Dispatcher $events)
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerFactories();
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadNavigationLinks($events);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            __DIR__.'/../Config/config.php' => config_path('ngo.php'),
        ], 'config');
        $this->mergeConfigFrom(
            __DIR__.'/../Config/config.php', 'ngo'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/ngo');

        $sourcePath = __DIR__.'/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ],'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/ngo';
        }, \Config::get('view.paths')), [$sourcePath]), 'ngo');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/ngo');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'ngo');
        } else {
            $this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'ngo');
        }
    }

    /**
     * Register an additional directory of factories.
     * 
     * @return void
     */
    public function registerFactories()
    {
        if (! app()->environment('production')) {
            app(Factory::class)->load(__DIR__ . '/../Database/factories');
        }
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

    private function loadNavigationLinks(Dispatcher $events)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            if (Auth::guard('ngo')->check()) {
                $event->menu->add('GENERAL REPORT');
                $event->menu->add([
                    'text' => 'Centers Map',
                    'url' => \route('ngo.centers.map'),
                    'icon' => 'map',
                ]);
                $event->menu->add('WAREHOUSE SETTINGS');
                $event->menu->add([
                    'text' => 'Inventory',
                    'url' => "#",
                    'icon' => 'database',
                ]);$event->menu->add([
                    'text' => 'Dispatch Report',
                    'url' => "#",
                    'icon' => 'truck',
                ]);
            }
        });
    }
}
