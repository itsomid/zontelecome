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
        if (config('app.locale') == 'en'){
            $products = [
                [
                    'title' => 'ZonFi V1 Global Modem',
                    'slug' => 'zonfi-global-modem',
                    'type' => 'physical',
                    'price' => '10.00',
                    'related_product' => 0,
                    'status' => '1',
                    'description' => 'ZonFi is your ultimate travel
companion. with its groundbreaking
EzFi Virtual Sim technology, the
modem switches carriers remotely
which ensures a stronger and faster
internet connection, as well as
noticeably lower roaming costs.
With its global coverage, you can
enjoy a local carrier experience in
over 110 countries worldwide at
4G/LTE speeds as high as 150Mbps.
Equipped With an embedded
6000mAh Li-ion battery, the device
can get up to 8 hours of battery life
and also be used to charge your
gadgets on the go. ZonFi requires no
configurations or setup and will get
you online With a simple push of a
button. You can also connect up to 8
of your WiFi enables devices
Simultaneously.',
                    'main_image_url'=>'/img/modem.png'
                ],
                [
                    'title' => 'ZonFi V2 Global Modem',
                    'slug' => 'zonfi-v2-global-modem',
                    'type' => 'physical',
                    'price' => '116.00',
                    'related_product' => 0,
                    'status' => '1',
                    'description' => 'ZonFi is your ultimate travel companion. with its groundbreaking EzFi Virtual Sim technology, the modem switches carriers remotely which ensures a stronger and faster internet connection, as well as noticeably lower roaming costs. With its global coverage, you can enjoy a local carrier experience in over 110 countries worldwide at 4G/LTE speeds as high as 150Mbps. Equipped With an embedded 6000mAh Li-ion battery, the device can get up to 14 hours of battery life. ZonFi requires no configurations or setup and Will get you online With a simple push of a button. You can also connect up to 8 of your WiFi enables devices Simultaneously',
                    'main_image_url'=>'/img/modem-v2.png'
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
                    'description' => 'Stay connected every step of the way with ZonTel Global Data SIM, the best mobile data solution for world travelers. Travel worldwide without worrying about data roaming charges, hunting for hotel WiFi and swapping SIM cards every time you cross a border.',
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
        }
        else{
            $products = [
                [
                    'title' => 'مودم جهانی ZonFi V1',
                    'slug' => 'zonfi-global-modem',
                    'type' => 'physical',
                    'price' => '10.00',
                    'related_product' => 0,
                    'status' => '1',
                    'description' => 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.',
                    'main_image_url'=>'/img/modem.png'
                ],
                [
                    'title' => 'مودم جهانی ZonFi V2',
                    'slug' => 'zonfi-v2-global-modem',
                    'type' => 'physical',
                    'price' => '116.00',
                    'related_product' => 0,
                    'status' => '1',
                    'description' => 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.',
                    'main_image_url'=>'/img/modem-v2.png'
                ],

                [
                    'title' => 'سیم کارت ZonTel EU',
                    'slug' => 'zontel-eu-simcard',
                    'type' => 'physical',
                    'price' => '12.00',
                    'related_product' => 0,
                    'status' => '1',
                    'description' => 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.',
                    'main_image_url'=>'/img/sim-eu.png'
                ],
                [
                    'title' => 'سیم کارت ZonTel Global',
                    'slug' => 'zontel-global-simcard',
                    'type' => 'physical',
                    'price' => '14.00',
                    'related_product' => 0,
                    'status' => '1',
                    'description' => 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.',
                    'main_image_url'=>'/img/sim-global.png'
                ]
                ,

                [
                    'title' => '1 GB',
                    'slug' => null,
                    'type' => 'virtual',
                    'price' => '2000',
                    'related_product' => 1,
                    'status' => '1',
                    'description' => 'package 1',
                    'main_image_url'=>''
                ] ,
                [
                    'title' => '2 GB',
                    'slug' => null,
                    'type' => 'virtual',
                    'price' => '2000',
                    'related_product' => 2,
                    'status' => '1',
                    'description' => 'package 2',
                    'main_image_url'=>''
                ],
                [
                    'title' => '3 GB',
                    'slug' => null,
                    'type' => 'virtual',
                    'price' => '2000',
                    'related_product' => 3,
                    'status' => '1',
                    'description' => 'package 3',
                    'main_image_url'=>''
                ],
                [
                    'title' => '4 GB',
                    'slug' => null,
                    'type' => 'virtual',
                    'price' => '2000',
                    'related_product' => 1,
                    'status' => '1',
                    'description' => 'package 4',
                    'main_image_url'=>''
                ],[
                    'title' => '5 GB',
                    'slug' => null,
                    'type' => 'virtual',
                    'price' => '12000',
                    'related_product' => 1,
                    'status' => '1',
                    'description' => 'packaewrge 4',
                    'main_image_url'=>''
                ],[
                    'title' => '6 GB',
                    'slug' => null,
                    'type' => 'virtual',
                    'price' => '5000',
                    'related_product' => 1,
                    'status' => '1',
                    'description' => 'packautkge 4',
                    'main_image_url'=>''
                ],[
                    'title' => '7 GB',
                    'slug' => null,
                    'type' => 'virtual',
                    'price' => '2000',
                    'related_product' => 1,
                    'status' => '1',
                    'description' => 'pacfdgkage 4',
                    'main_image_url'=>''
                ],[
                    'title' => '8 GB',
                    'slug' => null,
                    'type' => 'virtual',
                    'price' => '2000',
                    'related_product' => 1,
                    'status' => '1',
                    'description' => 'packagereet 4',
                    'main_image_url'=>''
                ],[
                    'title' => '9 GB',
                    'slug' => null,
                    'type' => 'virtual',
                    'price' => '3000.00',
                    'related_product' => 1,
                    'status' => '1',
                    'description' => 'package sgd',
                    'main_image_url'=>''
                ],

            ];
        }

        DB::table('products')->insert($products);
    }
}
