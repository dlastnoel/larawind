<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Models\Role;

class User extends Authenticatable implements HasMedia
{
    use HasFactory, Notifiable, HasRoles, InteractsWithMedia;

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

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(100)
            ->height(100);
    }

    public function getAvatarAttribute()
    {
        return $this->getMedia('user_avatars')->sortByDesc('created_at')->first()->getUrl();
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
