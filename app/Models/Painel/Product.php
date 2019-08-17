<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //protected $guarded = ['admin'];
    protected $fillable = [
    	'name','number','active','category','description'
    ];
}
