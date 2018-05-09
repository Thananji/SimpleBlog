<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    //
    protected $fillable = ['content', 'category_id','title', 'is_published', 'ratings'];

}
