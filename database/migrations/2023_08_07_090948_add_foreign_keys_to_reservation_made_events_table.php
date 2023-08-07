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
        Schema::table('reservation_made_events', function (Blueprint $table) {
            $table->foreign(['room_id'], 'reservation_made_events_ibfk_1')->references(['id'])->on('rooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reservation_made_events', function (Blueprint $table) {
            $table->dropForeign('reservation_made_events_ibfk_1');
        });
    }
};
