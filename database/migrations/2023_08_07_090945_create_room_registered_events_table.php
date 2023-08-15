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
        Schema::create('room_registered_events', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('room_name', 512)->default('unnamed_room');
            $table->string('room_location', 2048)->default('{ floor: null, landmark: null, }');
            $table->integer('room_capacity')->default(0);
            $table->string('room_facilities', 2048)->default('{ facilities: null, }');
            $table->dateTime('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room_registered_events');
    }
};
