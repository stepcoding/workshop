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
            $table->unsignedInteger('asset_category_id');
            $table->string('barcode');
            $table->unsignedInteger('asset_item_status_id');
            $table->string('cost_center_code');
            $table->string('paper_description');
            $table->timestamps();

            $table->foreign('asset_category_id')->references('id')->on('asset_category');
            $table->foreign('asset_item_status_id')->references('id')->on('asset_item_status');
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
