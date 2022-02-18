<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_anggota');
            $table->string('id_card');
            $table->string('no_telepon');
            $table->text('alamat');
            $table->biginteger('pengurus_id')->unsigned();
                    //foreign
                    $table->foreign('pengurus_id')
                    ->references('id')
                    ->on('suppliers');
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
        Schema::dropIfExists('jenis');
    }
}
