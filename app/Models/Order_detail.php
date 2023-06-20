<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order_detail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['stars', 'review'];

    function product(){
        return $this->belongsTo('App\Models\Product');
    }
}
