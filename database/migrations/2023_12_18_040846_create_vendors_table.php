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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pt_vendor')->nullable();
            $table->string('nama_vendor')->nullable();
            $table->string('jenis_vendor')->nullable();
            $table->string('pic_vendor')->nullable();
            $table->string('nama_contact_person')->nullable();
            $table->string('nohp_contact_person')->nullable();
            $table->string('link_dokumen')->nullable();
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
        Schema::dropIfExists('vendors');
    }
};
