<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'sku','name','description',
        'color','category_id',
        'manufacturer_id','country_id'
    ];

    public function category()
    {
        return $this->hasOne('App\Category');
    }

    public function manufacturer()
    {
        return $this->hasOne('App\Manufacturer');
    }

    public function country()
    {
        return $this->hasOne('App\Country');
    }
}
