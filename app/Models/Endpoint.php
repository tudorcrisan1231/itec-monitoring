<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endpoint extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function application(){
        return $this->belongsTo(Application::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function userApplications(){
        return $this->hasMany(UserApplication::class);
    }

    public function logs(){
        return $this->hasMany(Log::class);
    }
}
