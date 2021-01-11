<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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

   protected $with = ['replies']; //what relationship we want to load, chech question resource for this->replies, automatically puts join on it and put and object

    protected static function boot(){
        parent::boot();
        static::creating(function($question){
            $question->slug = Str::slug($question->title);
        });
    }



    //Or you can use $protected guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function replies(){
        return $this->hasMany(Reply::class)->latest();
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    //This is for specifying the api/question/1 id e muda para o slug
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getPathAttribute(){
        return "/question/$this->slug";
    }
}
