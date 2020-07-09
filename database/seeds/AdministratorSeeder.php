<?php

use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User;
        $user->nip="123456789";
        $user->name="Fajar Ary";
        $user->seksi="Pengawasan dan Konsultasi II";
        $user->email="fajar@admin.com";
        $user->password=\Hash::make("password");
        $user->role="admin";
        $user->save();
        $this->command->info("User Admin Berhasil Disimpan");
    }
}
