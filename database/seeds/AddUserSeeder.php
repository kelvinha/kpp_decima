<?php

use Illuminate\Database\Seeder;

class AddUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user2 = new \App\User;
        $user2->nip="060100179";
        $user2->name="Lisa Wahyu Hapsari Purwandani";
        $user2->seksi="Pengawasan dan Konsultasi II";
        $user2->email="lisa@admin.com";
        $user2->password=\Hash::make("password");
        $user2->role="admin";
        $user2->save();

        $user3 = new \App\User;
        $user3->nip="060082119";
        $user3->name="Sophia Sukmawati Dewi";
        $user3->seksi="Pengawasan dan Konsultasi II";
        $user3->email="sophia@pegawai.com";
        $user3->password=\Hash::make("rahasia");
        $user3->role="pegawai";
        $user3->save();

        $user4 = new \App\User;
        $user4->nip="060098591";
        $user4->name="Tafsir Ma`Rup";
        $user4->seksi="Pengawasan dan Konsultasi II";
        $user4->email="tafsir@pegawai.com";
        $user4->password=\Hash::make("rahasia");
        $user4->role="pegawai";
        $user4->save();
        $this->command->info("User Berhasil Ditambahkan");
    }
}
