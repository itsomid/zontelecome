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
        if (config('app.locale') == 'en')
        {
            $setting = [
                'tax_fee'     => 5.5,
                'delivery_fee'    => 2.00,
                'discount'    => 2,
                'pay_method' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ];
        }
        else{
            $setting = [
                'tax_fee'     => 0,
                'delivery_fee'    => 15000,
                'discount'    => 2,
                'pay_method' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ];
        }

        DB::table('setting')->insert($setting);

    }
}
