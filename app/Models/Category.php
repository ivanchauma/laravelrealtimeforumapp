<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    //Determina o $this->faker no factory
    protected $fillable = [
        'name',
        'slug',
    ];

      //This is for specifying the api/question/1 id e muda para o slug
      public function getRouteKeyName()
      {
          return 'slug';
      }
}
