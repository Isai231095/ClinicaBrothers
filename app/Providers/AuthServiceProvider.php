<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User; // Asegúrate de que el modelo User esté correctamente importado
use App\Policies\UserPolicy; // Asegúrate de que la política UserPolicy esté correctamente importada

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        User::class => UserPolicy::class, // Asocia User con UserPolicy
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any authentication / authorization services.
     */
    public function boot()
    {
        $this->registerPolicies();

        // Aquí puedes agregar definiciones de Gate adicionales si es necesario
    }
}
