<?php

namespace App\Services;

use Illuminate\Support\Facades\Gate;

class PermissionGateAndPolicyAccess {

    public function setGateAndPolicyAccess()
    {
        $this->defineGateCategory();
    }

    public function defineGateCategory()
    {
        Gate::define(config('permissions.access.list-product'), 'App\Policies\ProductPolicy@view');
        Gate::define(config('permissions.access.create-product'), 'App\Policies\ProductPolicy@create');
        Gate::define(config('permissions.access.list-category'), 'App\Policies\CategoryPolicy@view');
        Gate::define(config('permissions.access.list-user'), 'App\Policies\UserPolicy@view');
        Gate::define(config('permissions.access.create-user'), 'App\Policies\UserPolicy@create');
        Gate::define(config('permissions.access.list-news'), 'App\Policies\NewsPolicy@view');
        Gate::define(config('permissions.access.create-news'), 'App\Policies\NewsPolicy@create');
    }


}
