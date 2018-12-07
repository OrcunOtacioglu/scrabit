<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('crawler_id')->unsigned()->nullable();
            $table->foreign('crawler_id')->references('id')->on('crawlers')->onDelete('cascade');

            $table->string('reference')->unique()->nullable();
            $table->string('name')->nullable();

            $table->text('xpath')->nullable();
            $table->text('css_path')->nullable();
            $table->string('action')->nullable();

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
        Schema::dropIfExists('items');
    }
}
