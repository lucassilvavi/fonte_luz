<?php

namespace App\Providers;

use App\Models\Perfil;
use App\Models\Usuario;
use App\Repositories\RlPerfilPermissoesRepository;
use Illuminate\Contracts\Auth\Access\Gate as Gates;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(Gates $gates)
    {
        $this->registerPolicies();

        //
        $permissions = Perfil::with('permissoesAtivas')->get();
        foreach ($permissions as $permission) {
            foreach ($permission['permissoes'] as $permissoe){
                $gates->define($permissoe->no_permissao, function (Usuario $user) use ($permissoe) {
                    return $user->hasPermission($permissoe);
                });
            }


        }

    }
}
