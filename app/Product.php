<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table    = 'asset_item';
    protected $fillable = [
        'asset_category_id',
        'barcode',
        'asset_item_status_id',
        'cost_center_code',
        'paper_description',
    ];

    public function category()
    {
        return $this->hasMany('App\Category', 'id', 'asset_category_id');
    }

    public function ItemStatus()
    {
        return $this->hasMany('App\ItemStatus', 'id', 'asset_item_status_id');
    }

}
