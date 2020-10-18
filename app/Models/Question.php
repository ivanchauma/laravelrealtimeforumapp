<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'body',
        'category_id',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies(){
        return $this->belongsTo(Reply::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
