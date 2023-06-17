<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
                [
                'name_ar' => 'موافق',
                'name_en' => 'Accept',
                'visible'=>1
                 ],
                [
                    'name_ar' => 'مرفوض',
                    'name_en' => 'Reject',
                    'visible'=>1
                ],
                [
                    'name_ar' => 'تم الإرسال لشركة شحن',
                    'name_en' => 'Sent to the shipping company',
                    'visible'=>1
                ],
                [
                    'name_ar' => 'تم التسليم',
                    'name_en' => 'Delivery',
                    'visible'=>1
                ],
                [
                    'name_ar' => 'تم التجهيز',
                    'name_en' => 'preparation',
                    'visible'=>1
                ],
                [
                    'name_ar' => 'معلق',
                    'name_en' => 'pending',
                    'visible'=>1
                ],
                [
                    'name_ar' => 'إرجاع',
                    'name_en' => 'cancel',
                    'visible'=>1
                ],
                [
                    'name_ar' => 'ملغي من قبل المستخدم',
                    'name_en' => 'cancel from user',
                    'visible'=>1
                ],

            ]);
    }
}
