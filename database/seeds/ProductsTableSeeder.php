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
                'title' => 'ZoneFi Global Modem',
                'slug' => 'zone-global-modem',
                'type' => 'physical',
                'price' => '10.00',
                'related_product' => 0,
                'status' => '1',
                'description' => 'ZoneFi is your ultimate modem . . . ',
                'main_image_url'=>'/img/modem.png'
            ],

            [
                'title' => 'ZoneTel EU Sim',
                'slug' => 'zonetel-modem',
                'type' => 'physical',
                'price' => '12.00',
                'related_product' => 0,
                'status' => '1',
                'description' => 'ZoneFi is your ultimate modem . . . ',
                'main_image_url'=>'/img/sim.png'
            ],
            [
                'title' => 'ZoneFi Global Sim',
                'slug' => 'zonefi-global-modem',
                'type' => 'physical',
                'price' => '14.00',
                'related_product' => 0,
                'status' => '1',
                'description' => 'ZoneFi is your ultimate modem . . . ',
                'main_image_url'=>'/img/router.png'
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
            ],

        ];
        DB::table('products')->insert($products);
    }
}
