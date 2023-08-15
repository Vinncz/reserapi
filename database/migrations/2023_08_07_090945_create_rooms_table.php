<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->comment('master table for book-able rooms');
            $table->integer('id', true);
            $table->string('name', 512)->nullable()->default('unnamed_room')->comment('the name of the room');
            $table->string('announcement', 2048)->nullable()->default('{ [null ] }');
            $table->string('location', 1024)->nullable()->default('{ floor: null, landmark: null, }')->comment('JSON as follows:
{
  floor: number,
  landmark?: string,
}');
            $table->integer('capacity')->nullable()->default(0)->comment('how many person can fit?');
            $table->string('facilities', 2048)->nullable()->default('{ facilities: null, }')->comment('JSON as follows:
{
  facilities: [
    name,
    name,
    name,
  ],
}
  ');
            $table->dateTime('created_at')->nullable()->useCurrent();
            $table->dateTime('updated_at')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
};
