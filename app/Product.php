<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table    = 'asset_item';
    protected $fillable = [
        'asset_category_id',
        'barcode',
        'asset_item_staus_id',
        'cost_center_code',
        'paper_description',
    ];

}
