<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'title' => 'ZonFi Global Modem',
                'slug' => 'zonfi-global-modem',
                'type' => 'physical',
                'price' => '10.00',
                'related_product' => 0,
                'status' => '1',
                'description' => 'ZonFi is your ultimate travel companion. With its groundbreaking EzFi Virtual Sim technology, the modem switches carriers remotely which ensures a stronger and faster Internet connection, as well as noticably lower roaming costs. With its global coverage, you can enjoy a local carrier experience in over 110 countries worldwide at 4G/LTE speeds as high as 150Mbps.
Equipped with an embedded 6000mAh Li-ion battery, the device can get up to 14 hours of battery life and also be used to charge your gadgets on the go. ZonFi requires no configurations or setup and will get you online with a simple push of a button. You can also connect up to 8 of your WiFi enables devices simultaniously.',
                'main_image_url'=>'/img/modem.png'
            ],

            [
                'title' => 'ZonTel EU Simcard',
                'slug' => 'zontel-eu-simcard',
                'type' => 'physical',
                'price' => '12.00',
                'related_product' => 0,
                'status' => '1',
                'description' => 'Stay connected every step of the way with ZonTel EU Data SIM, the best mobile data solution for european travelers. Travel all through the EU without worrying about data roaming charges, hunting for hotel WiFi and swapping SIM cards every time you cross a border.',
                'main_image_url'=>'/img/sim-eu.png'
            ],
            [
                'title' => 'ZonTel Global Simcard',
                'slug' => 'zontel-global-simcard',
                'type' => 'physical',
                'price' => '14.00',
                'related_product' => 0,
                'status' => '1',
                'description' => 'Stay connected every step of the way with ZonTel EU Data SIM, the best mobile data solution for european travelers. Travel all through the EU without worrying about data roaming charges, hunting for hotel WiFi and swapping SIM cards every time you cross a border.',
                'main_image_url'=>'/img/sim-global.png'
            ]
            ,
            [
                'title' => '1 GB',
                'slug' => null,
                'type' => 'virtual',
                'price' => '2.00',
                'related_product' => 1,
                'status' => '1',
                'description' => 'package 1',
                'main_image_url'=>''
            ] ,
            [
                'title' => '2 GB',
                'slug' => null,
                'type' => 'virtual',
                'price' => '2.00',
                'related_product' => 2,
                'status' => '1',
                'description' => 'package 2',
                'main_image_url'=>''
            ],
            [
                'title' => '3 GB',
                'slug' => null,
                'type' => 'virtual',
                'price' => '2.00',
                'related_product' => 3,
                'status' => '1',
                'description' => 'package 3',
                'main_image_url'=>''
            ],
            [
                'title' => '4 GB',
                'slug' => null,
                'type' => 'virtual',
                'price' => '2.00',
                'related_product' => 1,
                'status' => '1',
                'description' => 'package 4',
                'main_image_url'=>''
            ],[
                'title' => '5 GB',
                'slug' => null,
                'type' => 'virtual',
                'price' => '12.30',
                'related_product' => 1,
                'status' => '1',
                'description' => 'packaewrge 4',
                'main_image_url'=>''
            ],[
                'title' => '6 GB',
                'slug' => null,
                'type' => 'virtual',
                'price' => '5.00',
                'related_product' => 1,
                'status' => '1',
                'description' => 'packautkge 4',
                'main_image_url'=>''
            ],[
                'title' => '7 GB',
                'slug' => null,
                'type' => 'virtual',
                'price' => '2.34',
                'related_product' => 1,
                'status' => '1',
                'description' => 'pacfdgkage 4',
                'main_image_url'=>''
            ],[
                'title' => '8 GB',
                'slug' => null,
                'type' => 'virtual',
                'price' => '2.50',
                'related_product' => 1,
                'status' => '1',
                'description' => 'packagereet 4',
                'main_image_url'=>''
            ],[
                'title' => '9 GB',
                'slug' => null,
                'type' => 'virtual',
                'price' => '3.00',
                'related_product' => 1,
                'status' => '1',
                'description' => 'package sgd',
                'main_image_url'=>''
            ],

        ];
        DB::table('products')->insert($products);
    }
}
