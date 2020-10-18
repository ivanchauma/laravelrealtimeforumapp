<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;
//Every reply is under question, this is for relations
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function like()
    {
        //Every reply has many likes
        return $this->hasMany(Like::class);
    }

    
    protected $fillable = [
        'body',
        'question_od',
        'user_id',
    ];
}
