<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    //One to One RelationShip with Catagory Table----------------
    function RelationWithCategoryTable(){
        return $this->hasOne('App\Models\Category', 'id', 'category_id')->withTrashed();
    }
    //On to many Relationship with ProductMultipleImage teble--------
    function RelationWithMultipleImageTable(){
        return $this->hasMany('App\Models\ProductMultipleImage', 'product_id', 'id')->withTrashed();
    }
}
