<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order = [
            [
                'c_mail' => 'o.shabani@hotmail.com',
                'c_name' => 'Omid',
                'c_address' => 'tehran',
                'c_state' => 'tehran',
                'c_city' => 'tehran',
                'c_country' => 'Bermuda',
                'c_zip' => '1234567892',
                'tax' => '2.00',
                'delivery_fee'=>'3.00',
                'total_price' => '10',
                'status' => 'paid',
                'by_admin' => 0,
                'description' => 'okey',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'c_mail' => 'sepid@yahoo.com',
                'c_name' => 'Sepide',
                'c_address' => 'tehran',
                'c_state' => 'tehran',
                'c_city' => 'tehran',
                'c_country' => 'Bermuda',
                'c_zip' => '3456789033',
                'tax' => '2.00',
                'delivery_fee'=>'3.00',
                'total_price' => '12',
                'status' => 'ready to deliver',
                'by_admin' => 0,
                'description' => 'okey',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'c_mail' => 'o.shabani@hotmail.com',
                'c_name' => 'Omid',
                'c_address' => 'tehran',
                'c_state' => 'tehran',
                'c_city' => 'tehran',
                'c_country' => 'Bermuda',
                'c_zip' => '1234567892',
                'tax' => '2.00',
                'delivery_fee'=>'3.00',
                'total_price' => '23',
                'status' => 'canceled',
                'by_admin' => 0,
                'description' => 'okey',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'c_mail' => 'sh@ya.com',
                'c_name' => 'shahin',
                'c_address' => 'tehran',
                'c_state' => 'tehran',
                'c_city' => 'tehran',
                'c_country' => 'Bermuda',
                'c_zip' => '1234567892',
                'tax' => '2.00',
                'delivery_fee'=>'3.00',
                'total_price' => '43',
                'status' => 'processing',
                'by_admin' => 0,
                'description' => 'okey',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'c_mail' => 'omid@gm.com',
                'c_name' => 'Omid',
                'c_address' => 'tehran',
                'c_state' => 'tehran',
                'c_city' => 'tehran',
                'c_country' => 'Bermuda',
                'c_zip' => '1234567892',
                'tax' => '2.00',
                'delivery_fee'=>'3.00',
                'total_price' => '83',
                'status' => 'paid',
                'by_admin' => 0,
                'description' => 'okey',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'c_mail' => 'o.js@hotmail.com',
                'c_name' => 'Omid',
                'c_address' => 'tehran',
                'c_state' => 'tehran',
                'c_city' => 'tehran',
                'c_country' => 'Bermuda',
                'c_zip' => '1234567892',
                'tax' => '2.00',
                'delivery_fee'=>'3.00',
                'total_price' => '28',
                'status' => 'paid',
                'by_admin' => 0,
                'description' => 'okey',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'c_mail' => 'admin@zontelecom.com',
                'c_name' => 'admin',
                'c_address' => 'tehran',
                'c_state' => 'tehran',
                'c_city' => 'tehran',
                'c_country' => 'Bermuda',
                'c_zip' => '657453534',
                'tax' => '2.00',
                'delivery_fee'=>'3.00',
                'total_price' => '40',
                'status' => 'ready to deliver',
                'by_admin' => 1,
                'description' => 'okey',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'c_mail' => 'o.shabani@hotmail.com',
                'c_name' => 'admin',
                'c_address' => 'tehran',
                'c_state' => 'tehran',
                'c_city' => 'tehran',
                'c_country' => 'Bermuda',
                'c_zip' => '657453534',
                'tax' => '2.00',
                'delivery_fee'=>'3.00',
                'total_price' => '40',
                'status' => 'paid',
                'by_admin' => 0,
                'description' => 'okey',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'c_mail' => 'o.shabani@hotmail.com',
                'c_name' => 'admin',
                'c_address' => 'tehran',
                'c_state' => 'tehran',
                'c_city' => 'tehran',
                'c_country' => 'Bermuda',
                'c_zip' => '657453534',
                'tax' => '2.00',
                'delivery_fee'=>'3.00',
                'total_price' => '40',
                'status' => 'paid',
                'by_admin' => 0,
                'description' => 'okey',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ];
        $cart = [
            [
                'quantity' => 1,
                'product_id' => '1',
                'order_id' => '1',
                'device_id'=> null,
                'description'=>'dec 2',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'quantity' => 2,
                'product_id' => '1',
                'order_id' => '2',
                'device_id'=> null,
                'description'=>'dec 2',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'quantity' => 4,
                'product_id' => '3',
                'order_id' => '2',
                'device_id'=> null,
                'description'=>'dec 2',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'quantity' => 1,
                'product_id' => '2',
                'order_id' => '3',
                'device_id'=> null,
                'description'=>'dec 2',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'quantity' => 4,
                'product_id' => '3',
                'order_id' => '4',
                'device_id'=> null,
                'description'=>'dec 2',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'quantity' => 1,
                'product_id' => '3',
                'order_id' => '5',
                'device_id'=> null,
                'description'=>'dec 2',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'quantity' => 1,
                'product_id' => '2',
                'order_id' => '6',
                'device_id'=> null,
                'description'=>'dec 2',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'quantity' => 5,
                'product_id' => '1',
                'order_id' => '6',
                'device_id'=> null,
                'description'=>'dec 2',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'quantity' => 4,
                'product_id' => '3',
                'order_id' => '7',
                'device_id'=> null,
                'description'=>'dec create by admin',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'quantity' => 1,
                'product_id' => '4',
                'order_id' => '8',
                'device_id'=> 'KF022496',
                'description'=>'data package',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'quantity' => 1,
                'product_id' => '5',
                'order_id' => '9',
                'device_id'=> 'KF022496',
                'description'=>'package',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ];
        $payment = [
            [
                'payment_details' => '{"scheme":"ZonTelecom","reference_id":"fake-1447"}',
                'order_id' => '1',
                'amount' => '10',
                'status' => 'successful',
                'reference' => 'ksjhdish83kdn234245',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'payment_details' => '{"scheme":"ZonTelecom","reference_id":"fake-1447"}',
                'order_id' => '2',
                'amount' => '10',
                'status' => 'canceled',
                'reference' => 'dfhghkgdhs346dgh',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'payment_details' => '{"scheme":"ZonTelecom","reference_id":"fake-1447"}',
                'order_id' => '2',
                'amount' => '10',
                'status' => 'successful',
                'reference' => 'asdfsg235ytjdfbhfg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'payment_details' => '{"scheme":"ZonTelecom","reference_id":"fake-1447"}',
                'order_id' => '3',
                'amount' => '10',
                'status' => 'failed',
                'reference' => '23445fdhdfgj465',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'payment_details' => '{"scheme":"ZonTelecom","reference_id":"fake-1447"}',
                'order_id' => '4',
                'amount' => '10',
                'status' => 'pending',
                'reference' => '32423dfhf7567',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'payment_details' => '{"scheme":"ZonTelecom","reference_id":"fake-1447"}',
                'order_id' => '5',
                'amount' => '10',
                'status' => 'successful',
                'reference' => '435fdgfgd435',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'payment_details' => '{"scheme":"ZonTelecom","reference_id":"fake-1447"}',
                'order_id' => '6',
                'amount' => '10',
                'status' => 'successful',
                'reference' => 'sdrg546457sf',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
            ,
            [
                'payment_details' => '{"scheme":"ZonTelecom","reference_id":"fake-1447"}',
                'order_id' => '8',
                'amount' => '15',
                'status' => 'successful',
                'reference' => '2356hjkgf325346fdb',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
            ,
            [
                'payment_details' => '{"scheme":"ZonTelecom","reference_id":"fake-124"}',
                'order_id' => '9',
                'amount' => '15',
                'status' => 'pending',
                'reference' => 'sdhhj5677ujyjh',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]

        ];
        DB::table('orders')->insert($order);
        DB::table('carts')->insert($cart);
        DB::table('payments')->insert($payment);
    }
}
