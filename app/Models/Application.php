<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $guarded = [];
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
        return $this->hasMany(Log::class);
    }
}
