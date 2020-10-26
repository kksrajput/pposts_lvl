<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class p_teamFaq extends Model
{
    //
    protected $guarded = [];


    

    // protected $casts = [
    //     'faq_Id' => 'array',
    //     'answer' => 'array',
    // ];

    protected $fillable = [
        "answer",
        "faq_id"
    ];
}
