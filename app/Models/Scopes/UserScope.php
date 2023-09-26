<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

trait UserScope
{
    public static function scopeCarriers($query): mixed
    {
        return $query->where('role_id', 2);
    }

    public static function scopeAdmins($query): mixed
    {
        return $query->where('role_id', 1);
    }
}
