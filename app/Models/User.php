<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'provider',
        'provider_id',
        'provider_token',
        'type_account',
        'super_admin',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'provider',
        'provider_token',
        'created_at', 'updated_at',

    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function rules($id = 0)
    {
        return
            [
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
            'status' => 'nullable|in:active,inactive',
            'type_account' => 'nullable|in:salesman,trader',
        ];
    }
    public function profile()
    {
        return $this->hasOne(Profile::class, 'user_id', 'id')
            ->withDefault();
    }
    public function role()
    {
        return $this->belongsToMany(Role::class);
    }

    public function roleuser()
    {
        return $this->belongsToMany(Role::class,'role_user');
    }
    public function review()
    {
        return $this->hasMany(Review::class);
    }

     //Accessors image
     public function getImageUrlAttribute()
     {
         if (!$this->image) {
             return 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRp7GkIkKG8b05fK0rVax1KGvXzC7hEOSDBdSRyM-D6adwsCrnlPacEKHK7z93cVTL0lHA&usqp=CAU';
         }
         if (Str::startsWith($this->image, ['http://', 'https://'])) {
             return $this->image;
         }
         return asset('storage/' . $this->image);
     }

     //scope Filter
    public function scopeFilter(Builder $builder, $filter)
    {
        if ($filter['name'] ?? null) {
            $builder->where('name', 'LIKE', "%{$filter['name']}%");
        }

    }
}
