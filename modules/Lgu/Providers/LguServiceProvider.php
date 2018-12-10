<?php

namespace Modules\Lgu\Providers;

use Illuminate\Events\Dispatcher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class LguServiceProvider extends ServiceProvider
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
            __DIR__.'/../Config/config.php' => config_path('lgu.php'),
        ], 'config');
        $this->mergeConfigFrom(
            __DIR__.'/../Config/config.php', 'lgu'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/lgu');

        $sourcePath = __DIR__.'/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ],'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/lgu';
        }, \Config::get('view.paths')), [$sourcePath]), 'lgu');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/lgu');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'lgu');
        } else {
            $this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'lgu');
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
            if (Auth::guard('lgu')->check()) {
                $event->menu->add('GENERAL SETTINGS');
                $event->menu->add([
                    'text' => 'Evacuation Centers',
                    'url' => \route('evacuation.centers.listing'),
                    'icon' => 'home',
                ]);
                $event->menu->add([
                    'text' => 'Center Details',
                    'url' => \route('center.listing'),
                    'icon' => 'home',
                ]);
                $event->menu->add([
                    'text' => 'Disasters/Calamities',
                    'url' => \route('disasters.listing'),
                    'icon' => 'warning',
                ]);
                $event->menu->add([
                    'text' => 'Household Needs',
                    'url' => \route('lgu.household.basic-needs'),
                    'icon' => 'info',
                ]);
                $event->menu->add('PRODUCT SETTINGS');
                $event->menu->add([
                    'text' => 'Products',
                    'url' => \route('products.listing'),
                    'icon' => 'database',
                ]);
//                $event->menu->add([
//                    'text' => 'Category',
//                    'url' => \route('product.categories.listing'),
//                    'icon' => 'list',
//                ]);
                $event->menu->add([
                    'text' => 'Brands',
                    'url' => \route('product.brands.listing'),
                    'icon' => 'list',
                ]);
            }
        });
    }
}
