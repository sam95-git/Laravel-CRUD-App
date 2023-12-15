<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //Table name
    protected $table = 'posts';

    //primary key
    protected $primaryKey = 'id';

    //Timestamps
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    
}
