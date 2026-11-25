<?php

namespace Database\Seeders;

use App\Models\Biodata;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Biodata::updateOrCreate(
            ['nim' => '24010110164'],
            [
                'nama' => 'Ihwan Kurniawan',
                'peran' => 'master',
                'deskripsi' => 'dari uts ini dengan tugas membuat front-end dan mengirimkannya ke grup',
                'foto' => 'images/ihwan.jpg',
            ]
        );

        Biodata::updateOrCreate(
            ['nim' => '24010110161'],
            [
                'nama' => 'Zelly Marliaty',
                'peran' => 'pegawai',
                'deskripsi' => 'dan mempunyai tugas mengerjakan back-end pada UTS ini',
                'foto' => 'images/zelly.jpg',
            ]
        );
    }
}
