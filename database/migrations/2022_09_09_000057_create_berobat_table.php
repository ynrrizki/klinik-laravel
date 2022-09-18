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
        Schema::create('berobat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id');
            $table->foreignId('dokter_id');
            $table->date('tgl_berobat');
            $table->string('keluhan_pasien');
            $table->string('hasil_diagnosa');
            // $table->enum('penatalaksanaan', []);
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
        Schema::dropIfExists('berobat');
    }
};
