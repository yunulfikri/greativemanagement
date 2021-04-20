<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductMarketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_market', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('status');
            $table->boolean('CreativeMarket')->default(false);
            $table->boolean('Website')->default(false);
            $table->boolean('Element')->default(false);
            $table->boolean('Canva')->default(false);
            $table->boolean('Etsy')->default(false);
            $table->boolean('DesignBundles')->default(false);
            $table->boolean('Crella')->default(false);
            $table->boolean('TemplateMonster')->default(false);
            $table->boolean('Dafont')->default(false);
            $table->boolean('TheHungryJPEG')->default(false);
            $table->boolean('FDR')->default(false);
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
        Schema::dropIfExists('product_market');
    }
}
