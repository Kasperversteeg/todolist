<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = [
    	'name', 'description', 'category_id', 'completed'
    ];

    public function categorys()
    {
    	return $this->belongsTo(Category::class);
    }
}
