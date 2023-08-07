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
        Schema::create('reservation_made_events', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('room_id')->index('room_id');
            $table->string('reserver_name', 1024)->nullable()->default('unknown');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->dateTime('created_at')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservation_made_events');
    }
};
