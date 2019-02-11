<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AssetItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('asset_item', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('asset_category_id');
            $table->string('barcode');
            $table->integer('asset_item_status_id');
            $table->string('cost_center_code');
            $table->string('paper_description');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('asset_item');
    }
}
