<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWartawansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wartawans', function (Blueprint $table) {
            $table->id('id_wartawan');
            $table->string('Nama');
            $table->string('Alamat');
            $table->string('Handphone');
            $table->string('Pendidikan');
            $table->string('KTP');
            $table->string('Ijazah_Terakhir');
            $table->string('Foto');
            $table->string('CV');
            $table->string('Surat_Lamaran');
            $table->string('Verifikasi');
            $table->string('Melamar');
            $table->string('Periode')->nullable();
            $table->integer('id_user');
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
        Schema::dropIfExists('wartawans');
    }
}
