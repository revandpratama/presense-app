<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function presense(){
        return $this->hasMany(Presense::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
