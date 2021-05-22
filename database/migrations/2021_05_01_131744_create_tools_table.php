<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmtag', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('content');
            $table->timestamps();
        });
        Schema::create('etsytag', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('content');
            $table->timestamps();
        });
        Schema::create('elementtag', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('content');
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
        Schema::dropIfExists('cmtag');
        Schema::dropIfExists('etsytag');
        Schema::dropIfExists('elementtag');
    }
}
