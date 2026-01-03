<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Permission;

class Role extends Model
{
    // Allow mass assignment
    protected $fillable = ['name'];

    // Many-to-Many: Role ↔ User
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    // Many-to-Many: Role ↔ Permission
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
