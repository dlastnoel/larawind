<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Models\Role;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'suffix',
        'email',
        'status',
        'terminated_at',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'terminated_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getRoleAttribute() {
        return $this->roles[0];
    }

    public function scopeFilter($query, $context) {
        return $query
            ->whereAny(['firstname', 'middlename', 'lastname', 'suffix'], 'LIKE', '%' . $context . '%');
            // ->orWhere(DB::raw('CONCAT(firstname," ",middlename, " ", lastname)'), 'LIKE', '%' . $context . '%')
            // ->orWhere(DB::raw('CONCAT(firstname," ",lastname)'), 'LIKE', '%' . $context . '%');
    }
}
