<?php
namespace Lwz\LaraverUnitTest;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class UnitTestServiceProvide extends ServiceProvider{
    public function boot()
    {
        $this->registerRoutes();

        $this->loadViewsFrom(
            __DIR__.'/../resources/views', 'myunit'
        );
    }

    /**
     * 设置路由的配置信息
     * @return array
     */
    private function routeConfiguration()
    {
        return [
            'namespace' => 'Lwz\LaraverUnitTest\Http\Controllers',
            'prefix' => 'myUnitTest',
        ];
    }

    /**
     * 注册路由
     */
    private function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__.'/Http/routes.php');
        });
    }

}