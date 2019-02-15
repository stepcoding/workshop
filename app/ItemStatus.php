<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemStatus extends Model
{

    protected $table    = 'asset_item_status';
    protected $fillable = [
        'name',
        'description',
    ];

}
