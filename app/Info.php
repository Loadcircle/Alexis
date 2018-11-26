<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $fillable =[
        'content', 'file', 'position', 'status'
    ];
}
