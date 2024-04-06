<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserApplication;
use Illuminate\Database\Eloquent\Builder;

class Application extends Model
{
    use HasFactory;
    protected $guarded = [];

    //write a boot metod that every time an application is requested, it will verify if the auth user has access to it, check in user_applications table
    protected static function boot()
    {
        parent::boot();

        // Define a global scope for filtering applications accessible by the authenticated user
        static::addGlobalScope('userAccess', function (Builder $builder) {
            // Check if the user is authenticated
            if (auth()->check()) {
                if (auth()->user()->role_id == 2) {
                    // Admin user, no restriction needed
                    return;
                }

                // For non-admin users, filter based on user access
                $builder->whereHas('users', function ($query) {
                    $query->where('users.id', auth()->id());
                });
            }
        });
    }

    public function endpoints(){
        return $this->hasMany(Endpoint::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function userApplications(){
        return $this->hasMany(UserApplication::class);
    }

    public function logs(){
        return $this->hasMany(Log::class)->orderBy('created_at', 'desc');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_applications');
    }

    public function reports(){
        return $this->hasMany(Report::class);
    }
}
