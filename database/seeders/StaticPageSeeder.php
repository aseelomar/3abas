<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StaticPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('static_pages')->insert([
                                          [
                                              'page_title_ar' => ' الدعم الفني',
                                              'page_title_en' => 'Technical support',
                                              'page_body_ar'=>'الدعم الفنيالدعم الفنيالدعم الفنيالدعم الفنيالدعم الفنيالدعم الفنيالدعم الفنيالدعم الفنيالدعم الفنيالدعم الفني',
                                              'page_body_en'=>'Technical supportTechnical supportTechnical supportTechnical supportTechnical supportTechnical support',
                                              'page_image'=>'test.png',
                                              'is_visible'=>1,
                                              'is_delete'=>0,
                                              'created_by'=>1,

                                          ],
                                          [
                                              'page_title_ar' => 'تسوق بكل ثقة',
                                              'page_title_en' => 'Shop with confidence',
                                              'page_body_ar'=>'تسوق بكل ثقةتسوق بكل ثقةتسوق بكل ثقةتسوق بكل ثقةتسوق بكل ثقةتسوق بكل ثقة',
                                              'page_body_en'=>'Shop with confidence',
                                              'page_image'=>'test.png',
                                              'is_visible'=>1,
                                              'is_delete'=>0,
                                              'created_by'=>1,

                                          ],[
                                              'page_title_ar' => 'من نحن',
                                              'page_title_en' => 'who are we',
                                              'page_body_ar'=>'من نحنمن نحنمن نحنمن نحنمن نحنمن نحنمن نحنمن نحنمن نحنمن نحنمن نحنمن نحنمن نحن',
                                              'page_body_en'=>'who are we',
                                              'page_image'=>'test.png',
                                              'is_visible'=>1,
                                              'is_delete'=>0,
                                              'created_by'=>1,

                                          ],
                                            [
                                              'page_title_ar' => 'موقعنا',
                                              'page_title_en' => 'Our Location',
                                              'page_body_ar'=>'موقعناموقعناموقعناموقعناموقعناموقعناموقعناموقعناموقعناموقعناموقعناموقعناموقعناموقعناموقعنا',
                                              'page_body_en'=>'Our Location',
                                              'page_image'=>'test.png',
                                              'is_visible'=>1,
                                              'is_delete'=>0,
                                              'created_by'=>1,

                                          ],
                                          [
                                              'page_title_ar' => 'اسعار تنافسية',
                                              'page_title_en' => 'Competitive prices',
                                              'page_body_ar'=>'اسعار تنافسيةاسعار تنافسيةاسعار تنافسيةاسعار تنافسيةاسعار تنافسيةاسعار تنافسيةاسعار تنافسية',
                                              'page_body_en'=>'Competitive prices',
                                              'page_image'=>'test.png',
                                              'is_visible'=>1,
                                              'is_delete'=>0,
                                              'created_by'=>1,

                                          ],
                                          [
                                              'page_title_ar' => 'اتفاقية المستخدم',
                                              'page_title_en' => 'User Agreement',
                                              'page_body_ar'=>'اتفاقية المستخدماتفاقية المستخدماتفاقية المستخدماتفاقية المستخدماتفاقية المستخدماتفاقية المستخدم',
                                              'page_body_en'=>'User Agreement',
                                              'page_image'=>'test.png',
                                              'is_visible'=>1,
                                              'is_delete'=>0,
                                              'created_by'=>1,

                                          ],
                                          [
                                              'page_title_ar' => 'المسوقين',
                                              'page_title_en' => 'marketers',
                                              'page_body_ar'=>'المسوقينالمسوقينالمسوقينالمسوقينالمسوقينالمسوقينالمسوقينالمسوقينالمسوقينالمسوقينالمسوقينالمسوقين',
                                              'page_body_en'=>'marketers',
                                              'page_image'=>'test.png',
                                              'is_visible'=>1,
                                              'is_delete'=>0,
                                              'created_by'=>1,

                                          ],
                                          [
                                              'page_title_ar' => 'الدفع الامن',
                                              'page_title_en' => 'secure payment',
                                              'page_body_ar'=>'الدفع الامنالدفع الامنالدفع الامنالدفع الامنالدفع الامنالدفع الامنالدفع الامنالدفع الامنالدفع الامن',
                                              'page_body_en'=>'secure payment',
                                              'page_image'=>'test.png',
                                              'is_visible'=>1,
                                              'is_delete'=>0,
                                              'created_by'=>1,

                                          ],[
                                              'page_title_ar' => 'اتصل بنا',
                                              'page_title_en' => 'call us',
                                              'page_body_ar'=>'اتصل بنااتصل بنااتصل بنااتصل بنااتصل بنااتصل بنااتصل بنااتصل بنااتصل بنااتصل بنا',
                                              'page_body_en'=>'call us',
                                              'page_image'=>'test.png',
                                              'is_visible'=>1,
                                              'is_delete'=>0,
                                              'created_by'=>1,

                                          ],
                                          [
                                              'page_title_ar' => 'شروط الخدمة',
                                              'page_title_en' => 'Terms of Service',
                                              'page_body_ar'=>'شروط الخدمةشروط الخدمةشروط الخدمةشروط الخدمةشروط الخدمةشروط الخدمةشروط الخدمةشروط الخدمة',
                                              'page_body_en'=>'Terms of Service',
                                              'page_image'=>'test.png',
                                              'is_visible'=>1,
                                              'is_delete'=>0,
                                              'created_by'=>1,

                                          ],

                                      ]);
    }
}
