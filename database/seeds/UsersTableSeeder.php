<?php
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        User::create(array(
            'name'     => 'Chris Sevilleja',
            'email'    => 'admin@zontelecom.com',
            'password' => Hash::make('Zon#135!'),
        ));
    }
}
