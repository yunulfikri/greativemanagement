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
            $table->string('CreativeMarket')->nullable();
            $table->string('Website')->nullable();
            $table->string('Element')->nullable();
            $table->string('Canva')->nullable();
            $table->string('Etsy')->nullable();
            $table->string('DesignBundles')->nullable();
            $table->string('Crella')->nullable();
            $table->string('TemplateMonster')->nullable();
            $table->string('Dafont')->nullable();
            $table->string('TheHungryJPEG')->nullable();
            $table->string('FDR')->nullable();
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
