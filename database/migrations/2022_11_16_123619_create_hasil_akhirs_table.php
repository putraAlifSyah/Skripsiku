<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilAkhirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_akhirs', function (Blueprint $table) {
            $table->id();
            $table->integer('id_calon');
            $table->string('nama_calon');
            $table->string('kontak');
            $table->string('periode');
            $table->string('status');
            $table->double('hasil');
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
        Schema::dropIfExists('hasil_akhirs');
    }
}
