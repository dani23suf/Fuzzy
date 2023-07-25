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
        Schema::create('detail_himpunan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('himpunan_id')->nullable();
            $table->foreign('himpunan_id')->references('id')->on('himpunan')->cascadeOnDelete();
            $table->float('nilai_min');
            $table->float('nilai_max');
            $table->string('nama_fungsi_keanggotaan');
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
        Schema::dropIfExists('detail_himpunan');
    }
};
