<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFreepikTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freepik_tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('quantity')->nullable();
            $table->text('ref')->nullable();
            $table->date('deadline');
            $table->foreignId('member_id');
            $table->string('status');
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
        Schema::dropIfExists('freepik_tasks');
    }
}
