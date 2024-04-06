<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $guarded = [];
    use HasFactory;

    protected static function boot()
    {
        parent::boot();

        // Define a global scope for filtering logs based on user's access to associated application
        static::addGlobalScope('userLogAccess', function (Builder $builder) {
            // Check if the user is authenticated
            if (auth()->check()) {
                $userId = auth()->id();
                $userRoleId = auth()->user()->role_id;

                if ($userRoleId == 2) {
                    // Admin user, no restriction needed
                    return;
                }

                // For non-admin users, filter logs based on user's access to applications
                $builder->whereHas('application', function ($query) use ($userId) {
                    $query->whereHas('users', function ($innerQuery) use ($userId) {
                        $innerQuery->where('users.id', $userId);
                    });
                });
            }
        });
    }

    public function application(){
        return $this->belongsTo(Application::class);
    }
}
