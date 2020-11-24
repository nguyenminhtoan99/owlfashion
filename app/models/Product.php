<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable=['name','slug','description','cat_id','price','brand_id','discount','status','photo','size','quantity','condition'];


    public function categories()
    {
        return $this->belongsto('App\models\Category','cat_id','id');
    }

    public function brands(){
        return $this->belongsTo('App\models\Brand','brand_id','id');
    }

    public $timestamps = true;
}
