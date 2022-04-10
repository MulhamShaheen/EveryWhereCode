<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'board_id',
        'action',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function board(){
        return $this->belongsTo(Board::class);
    }
}
