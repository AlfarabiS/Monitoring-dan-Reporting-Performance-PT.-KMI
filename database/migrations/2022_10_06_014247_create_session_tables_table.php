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
        Schema::create('session_tables', function (Blueprint $table) {
            $table->id();
            $table->string('NIK')->unique();
            $table->string('process_id');
            $table->string('gudang_id');
            $table->time('time_start')->nullable();
            $table->time('time_end')->nullable();
            $table->time('hold_start')->nullable();
            $table->time('hold_end')->nullable();
            $table->text('keterangan')->nullable();
            $table->boolean('hold_status');
            $table->integer('hold_count');
            $table->time('holdtime')->nullable();
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
        Schema::dropIfExists('session_tables');
    }
};
