<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class p_genre extends Model
{
    //
    protected $table='p_genres';
    //Primary key
    public $primaryKey = 'genre_id';
    //Timestamps
    public $timestamps= true;
    protected $fillable = [ 
        "genre_id",  
        "genre_code",
        "genre_name",
        "is_deleted"
        
    ];
}
