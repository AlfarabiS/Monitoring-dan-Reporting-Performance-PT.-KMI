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
        Schema::create('on_goings', function (Blueprint $table) {
            $table->id();
            $table->string('NIK')->unique;
            $table->string('process_id');
            $table->string('gudang_id');
            $table->time('time_start');
            $table->time('time_end')->nullable;
            $table->boolean('active');
            $table->text('keterangan')->nullable;
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
        Schema::dropIfExists('on_goings');
    }
};
