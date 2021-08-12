<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function publisher(){
        return $this->belongsTo(Publisher::class,'publisher_id','id');
    }

    public function classification(){
       return $this->belongsTo(Classification::class,'classification_id','id');
    } 

    public function author() {
        return $this->belongsTo(Author::class,'author_id','id');
    }

}
