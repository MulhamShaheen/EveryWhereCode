<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tasks(){
        return $this->hasMany(Task::class);
    }
    public function accesses(){
        return $this->hasMany(Access::class);
    }
}
