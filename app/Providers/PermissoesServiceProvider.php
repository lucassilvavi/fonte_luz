<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 18/10/2017
 * Time: 20:33
 */

namespace App\Providers;
use App\Http\Controllers\Facade\Permissoes;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class PermissoesServiceProvider extends ServiceProvider
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
        App::bind('permissoes', function () {
            return new Permissoes();
        });
    }
}
