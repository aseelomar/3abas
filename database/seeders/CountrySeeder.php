<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = '
        [{"id":1,"alpha2":"af","alpha3":"afg","ar":"رام الله","en":"Ramallah"},
        {"id":2,"alpha2":"af","alpha3":"afg","ar":"نابلس ","en":"Nablus"},
        {"id":3,"alpha2":"af","alpha3":"afg","ar":"الخليل ","en":"Hebron"},
        {"id":4,"alpha2":"af","alpha3":"afg","ar":"بيت لحم ","en":"Bethlehem"},
        {"id":5,"alpha2":"af","alpha3":"afg","ar":"اريحا والاغوار  ","en":"Jericho and the Jordan Valley"},
        {"id":6,"alpha2":"af","alpha3":"afg","ar":"قلقيليه ","en":"Qalqilya"},
        {"id":7,"alpha2":"af","alpha3":"afg","ar":"طولكرم ","en":"Tulkarm"},
        {"id":8,"alpha2":"af","alpha3":"afg","ar":"جنين  ","en":"Jenin"},
        {"id":9,"alpha2":"af","alpha3":"afg","ar":"القدس","en":"Quds"},
        {"id":10,"alpha2":"af","alpha3":"afg","ar":"بئر السبع ","en":"Beersheba"},
        {"id":11,"alpha2":"af","alpha3":"afg","ar":"الجنوب ","en":"the South"},
        {"id":12,"alpha2":"af","alpha3":"afg","ar":"المثلث الطيبه  ","en":"The good triangle"},
        {"id":13,"alpha2":"af","alpha3":"afg","ar":"الطيرة  ","en":"Tira "},
        {"id":14,"alpha2":"af","alpha3":"afg","ar":"قلنسوة ","en":"cap "},
        {"id":15,"alpha2":"af","alpha3":"afg","ar":"كفرقاسم ","en":"Kafr Kassem "},
        {"id":16,"alpha2":"af","alpha3":"afg","ar":"جلجوليه ","en":"Jaljulia"},
        {"id":17,"alpha2":"af","alpha3":"afg","ar":"طبريا","en":"Tiberias"},
        {"id":18,"alpha2":"af","alpha3":"afg","ar":"الشمال","en":"North"},
        {"id":19,"alpha2":"af","alpha3":"afg","ar":"حيفا ","en":"Haifa"},
        {"id":20,"alpha2":"af","alpha3":"afg","ar":"عكا ","en":"Acre"},
        {"id":21,"alpha2":"af","alpha3":"afg","ar":"الساحل ","en":"the coast"},
        {"id":22,"alpha2":"af","alpha3":"afg","ar":"سلفيت ","en":"Salfit"},
        {"id":23,"alpha2":"af","alpha3":"afg","ar":"الناصره ","en":"Nazareth"},
        {"id":24,"alpha2":"af","alpha3":"afg","ar":"اخرى ","en":"other"}
]';
        $countries = json_decode($countries , true);
        foreach ($countries as $country) {
            Country::create([

                'name'          => ['ar' => $country['ar'] , 'en' => $country['en'] ],
                'iso2'          => $country['alpha2'],
                'iso3'          => $country['alpha3'],
                'is_active'     => 1
            ]);
        }
    }

}
