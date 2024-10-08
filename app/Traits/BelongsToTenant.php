<?php

namespace App\Traits;

use App\Models\Scopes\TenantScope;
use App\Models\Tenant;

trait BelongsToTenant
{
    protected static function bootBelongsToTenant(): void
    {
        static::addGlobalScope(new TenantScope);

        static::creating(function ($user) {
            if (session()->has('tenant_id')) {
                $user->tenant_id = session('tenant_id');
            }
        });
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}
