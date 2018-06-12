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
       $setting = [
           'tax_fee'     => 5.5,
           'delivery_fee'    => 2.00,
           'pay_method' => 0,
           'created_at' => Carbon::now()->format('Y-m-d H:i:s')
       ];
        DB::table('setting')->insert($setting);

    }
}
