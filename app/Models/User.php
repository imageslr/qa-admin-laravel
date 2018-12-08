<?php

namespace App\Models;

class User extends Model
{
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
