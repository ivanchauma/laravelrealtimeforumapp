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

    //Or you can use $protected guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function replies(){
        return $this->hasMany(Reply::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    //This is for specifying the api/question/1 id e muda para o slug
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
