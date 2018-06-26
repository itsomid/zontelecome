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
                'description' => 'ZoneFi is your ultimate modem . . . ',
                'main_image_url'=>'/img/modem.png'
            ],

            [
                'title' => 'ZonTel EU Simcard',
                'slug' => 'zontel-eu-sim',
                'type' => 'physical',
                'price' => '12.00',
                'related_product' => 0,
                'status' => '1',
                'description' => 'ZoneFi is your ultimate modem . . . ',
                'main_image_url'=>'/img/sim-eu.png'
            ],
            [
                'title' => 'ZonTel Global Simcard',
                'slug' => 'zontel-global-sim',
                'type' => 'physical',
                'price' => '14.00',
                'related_product' => 0,
                'status' => '1',
                'description' => 'ZoneFi is your ultimate modem . . . ',
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
