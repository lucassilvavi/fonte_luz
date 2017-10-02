<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 01/10/2017
 * Time: 13:29
 */

namespace App\Providers;
use App\Http\Controllers\Facade\UF;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class UFServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('uf', function () {
            return new UF();
        });
    }
}
