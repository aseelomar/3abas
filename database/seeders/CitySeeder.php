<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $city = '
        [
            {"id": 1,"code": 1,"name": "Adrar","ar_name": "أدرار","longitude": 28.0174403,"latitude": -0.2642497 },
            {"id": 2,"code": 2,"name": "Chlef","ar_name": "الشلف","longitude": 36.1579664,"latitude": 1.3372823 },
            {"id": 3,"code": 3,"name": "Laghouat","ar_name": "الأغواط","longitude": 33.8078341,"latitude": 2.8628294 },
            {"id": 4,"code": 4,"name": "Oum El Bouaghi","ar_name": "أم البواقي","longitude": 35.8688789,"latitude": 7.1108266 },
            {"id": 5,"code": 5,"name": "Batna","ar_name": "باتنة","longitude": 35.5634192,"latitude": 6.1889996 },
            {"id": 6,"code": 6,"name": "Béjaïa","ar_name": "بجاية","longitude": 36.7515258,"latitude": 5.0556837 },
            {"id": 7,"code": 7,"name": "Biskra","ar_name": "بسكرة","longitude": 34.8449437,"latitude": 5.7248567 },
            {"id": 8,"code": 8,"name": "Bechar","ar_name": "بشار","longitude": 31.6238098,"latitude": -2.2162443 },
            {"id": 9,"code": 9,"name": "Blida","ar_name": "البليدة","longitude": 36.4735715,"latitude": 2.8323153 },
            {"id": 10,"code": 10,"name": "Bouira","ar_name": "البويرة","longitude": 36.3691846,"latitude": 3.9006194 },
            {"id": 11,"code": 11,"name": "Tamanrasset","ar_name": "تمنراست","longitude": 22.7902972,"latitude": 5.5193268 },
            {"id": 12,"code": 12,"name": "Tbessa","ar_name": "تبسة","longitude": 35.1290691,"latitude": 7.9592863 },
            {"id": 13,"code": 13,"name": "Tlemcen","ar_name": "تلمسان","longitude": 34.8828864,"latitude": -1.3166815 },
            {"id": 14,"code": 14,"name": "Tiaret","ar_name": "تيارت","longitude": 35.3708689,"latitude": 1.3217852 },
            {"id": 15,"code": 15,"name": "Tizi Ouzou","ar_name": "تيزي وزو","longitude": 36.706911,"latitude": 4.2333355 },
            {"id": 16,"code": 16,"name": "Alger","ar_name": "الجزائر","longitude": 36.753768,"latitude": 3.0587561 },
            {"id": 17,"code": 17,"name": "Djelfa","ar_name": "الجلفة","longitude": 34.6703956,"latitude": 3.2503761 },
            {"id": 18,"code": 18,"name": "Jijel","ar_name": "جيجل","longitude": 36.8210144,"latitude": 5.7634126 },
            {"id": 19,"code": 19,"name": "Setif","ar_name": "سطيف","longitude": 36.1897593,"latitude": 5.4107984 },
            {"id": 20,"code": 20,"name": "Saefda","ar_name": "سعيدة","longitude": 36.7505029,"latitude": 3.4695305 },
            {"id": 21,"code": 21,"name": "Skikda","ar_name": "سكيكدة","longitude": 36.8662658,"latitude": 6.9062556 },
            {"id": 22,"code": 22,"name": "Sidi Bel Abbes","ar_name": "سيدي بلعباس","longitude": 35.2105876,"latitude": -0.629983 },
            {"id": 23,"code": 23,"name": "Annaba","ar_name": "عنابة","longitude": 36.9142081,"latitude": 7.7426673 },
            {"id": 24,"code": 24,"name": "Guelma","ar_name": "قالمة","longitude": 36.4627444,"latitude": 7.4330833 },
            {"id": 25,"code": 25,"name": "Constantine","ar_name": "قسنطينة","longitude": 36.3570052,"latitude": 6.6390282 },
            {"id": 26,"code": 26,"name": "Medea","ar_name": "المدية","longitude": 36.2637078,"latitude": 2.7587857 },
            {"id": 27,"code": 27,"name": "Mostaganem","ar_name": "مستغانم","longitude": 35.9311454,"latitude": 0.0909414 },
           
            ]';

        $cities = json_decode($city , true);

        foreach ($cities as $citys) {
            City::create([
                'name'=>['en' => $citys['name']],

                 'code'          => $citys['code'],
                'country'          => $citys['country'],
                'is_active'     => 1
            ]);
        }
    }
}
