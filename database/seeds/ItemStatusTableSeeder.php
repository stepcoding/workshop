<?php

use Illuminate\Database\Seeder;

class ItemStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('asset_item_status')->insert([[
            'name' => "ใช้งาน",
            'description' => "คำอธิบาย",
        ]
        ,[  'name' => "ใช้งานไม่ได้",
        'description' => "คำอธิบาย",
        ]
        ,[  'name' => "ส่งซ่อม",
            'description' => "คำอธิบาย",
        ]]);
    }
}
