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
        Schema::create('reservations', function (Blueprint $table) {
            $table->comment('reservation data for each of the room listed in rooms table');
            $table->integer('id', true);
            $table->integer('room_id')->index('FOREIGN')->comment('targeting which room?');
            $table->integer('user_id', $unsigned = false)->index('reserver')->comment('who\'s the reserver?');
            $table->string('subject', 1024)->nullable()->default('undisclosed topic')->comment('what\'s the topic of this reservation?');
            $table->integer('priority_id', $unsigned = false)->index('urgency')->comment('what\'s the importance level of this reservation?');
            $table->string('remark', 2048)->nullable()->default('no remark was left')->comment('holds the reservation maker comment(s)');
            $table->dateTime('start')->comment('indicating the start of the reservation period');
            $table->dateTime('end')->comment('indicating the end of the reservation period');
            $table->char('pin', 6)->nullable()->default('123456')->comment('to protect against unauthorized manipulation of the reservation info');
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
        Schema::dropIfExists('reservations');
    }
};
