<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\Confiq;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SocialMediaPageController extends Controller
{
    public function index()
    {

        $this->setPage();
        $fackbook = Confiq::getValue('facebook');
        $instagram = Confiq::getValue('instagram');
        $other = Confiq::getValue('other');
        $twitter = Confiq::getValue('twitter');


        return $this->setView('admin.social.index')->with('facebook', $fackbook)
            ->with('instagram', $instagram)
            ->with('other', $other)
            ->with('twitter', $twitter);
    }

    public function store(Request $request)
    {
        // dd($request);
        // return('ggg');
        $validated = $request->validate([
            'name' => 'max:255',
            'value' => 'max:255',
        ]);

        $pageArray = $fieldArray = $reqForm = [];
        if (!empty($_FILES)) {
            if (!empty($_FILES)) {

                   $image = $_FILES['file']['tmp_name'];
                   $files = $request->file('file');
                $timeNow = Carbon::now('UTC');

                $time = $timeNow->minute . '_' . $timeNow->second . '_' . $timeNow->hour . '_' . $timeNow->day . '_' . $timeNow->month . '_' . $timeNow->year;

                $name = $time . '_'  . '_' . $_FILES['file']['name'];

                $files->move('images/setting/', $name);

                Confiq::setValue('icon',$name);
                return ['message' => __(' Success'), 'code' => 204];

            }
        }
        if (!empty($request->formData)) {
            foreach ($request->formData as $req) {

                    $reqForm[$req['name']] = $req['value'];

            }

            if (isset($reqForm) && !empty($reqForm)) {
                foreach ($reqForm as  $key => $value) {
                    if ($key == '_token') {
                    } else {

                        $colCheck = Confiq::where('name', $key)->first();
                        if (isset($colCheck)) {
                            Confiq::where('name', $key)->update(['value' => $value]);
                        } else {
                            Confiq::insert(['name' => $key, 'value' => $value]);
                        }
                    }
                }
            }
        }
        return ['message' => __(' Success'), 'code' => 204];
    }



    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
