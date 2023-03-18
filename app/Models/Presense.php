<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presense extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    protected $casts = [
        // 'created_at' => 'datetime:Y-m-d\TH:i',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }   

    public function subject(){
        return $this->belongsTo(Subject::class);
    }
}
