<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'user';
        $user->email = 'user@user.com';
        $user->email_verified_at = '2020-02-11 14:43:22';
        $user->password = bcrypt('12345');
        $user->nik = rand(1,99999);
        $user->telepon = '0899123912';
        $user->alamat = 'villa melati mas';
        $user->posisi = 'karyawan';
        $user->divisi = 'IT';
        $user->role = 'User';
        $user->status = 'A';
        $user->api_token = Str::random(80);
        $user->save();

        DB::table('jatahcuti')->insert([
            'user_id' => $user->id,
            'jatahcuti' => 12
        ]);

        DB::table('salaries')->insert([
            'user_id' => $user->id,
            'tanggal' => '25 Jan 2020',
            'nominal' => '3500000',
            'status' => 'A'
        ]);

        $HRD = new User();
        $HRD->name = 'HRD User';
        $HRD->email = 'hrd@hrd.com';
        $HRD->email_verified_at = '2020-02-11 14:43:22';
        $HRD->password = bcrypt('12345');
        $HRD->nik = rand(1,99999);
        $HRD->telepon = '0899123912';
        $HRD->alamat = 'villa melati mas';
        $HRD->posisi = 'HRD';
        $HRD->divisi = 'Human Resource';
        $HRD->role = 'Admin';
        $HRD->status = 'A';
        $HRD->api_token = Str::random(80);
        $HRD->save();

        DB::table('jatahcuti')->insert([
            'user_id' => $HRD->id,
            'jatahcuti' => 12
        ]);

        DB::table('salaries')->insert([
            'user_id' => $HRD->id,
            'tanggal' => '25 Jan 2020',
            'nominal' => '3500000',
            'status' => 'A'
        ]);
        
        $GA = new User();
        $GA->name = 'GA User';
        $GA->email = 'ga@ga.com';
        $GA->email_verified_at = '2020-02-11 14:43:22';
        $GA->password = bcrypt('12345');
        $GA->nik = rand(1,99999);
        $GA->telepon = '0899123912';
        $GA->alamat = 'villa melati mas';
        $GA->posisi = 'GA';
        $GA->divisi = 'General Affairs';
        $GA->role = 'Admin';
        $GA->status = 'A';
        $GA->api_token = Str::random(80);
        $GA->save();

        DB::table('jatahcuti')->insert([
            'user_id' => $GA->id,
            'jatahcuti' => 12
        ]);

        DB::table('salaries')->insert([
            'user_id' => $GA->id,
            'tanggal' => '25 Jan 2020',
            'nominal' => '3500000',
            'status' => 'A'
        ]);
    }
}
