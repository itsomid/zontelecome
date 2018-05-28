<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $setting =[
           'tax_fee'     => 6.00,
           'delivery_fee'    => 12.00,
           'created_at' => Carbon::now()->format('Y-m-d H:i:s')
       ];
        DB::table('setting')->insert($setting);

    }
}
