<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $fillable= ['name', 'category_id', 'user_id', 'order'];

    public function users(){
    	return $this->belongsTo(User::class);
    }

    public function category() {
            return $this->hasOne(Category::class);
        }



}
