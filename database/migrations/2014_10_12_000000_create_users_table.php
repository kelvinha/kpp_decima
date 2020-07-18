<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nip',9)->unique();
            $table->string('name',50);
            $table->enum('seksi',['Seksi Pengawasan dan Konsultasi II','Seksi Pengawasan dan Konsultasi III','Seksi Pengawasan dan Konsultasi IV','Seksi Ekstensifikasi dan Penyuluhan']);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('role',['admin','pegawai']);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
