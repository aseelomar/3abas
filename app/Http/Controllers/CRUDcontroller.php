<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CRUDcontroller extends Controller
{

    public static function getRequest($request)
    {
        $pageArray = $fieldArray = $reqForm = [];

        if (!empty($request->formData)) {
            foreach ($request->formData as $req) {
                $reqForm[$req['name']] = $req['value'];
            }

            if (isset($reqForm) && !empty($reqForm)) {
                foreach ($reqForm as  $key => $value) {
                    if ($key == '_token') {
                    } elseif ($key == 'password') {
                        $hash = Hash::make($value);

                        $fieldArray[$key] = $hash;
                    } else {
                        $fieldArray[$key] = $value;
                    }
                }
            }
        }

        return $fieldArray;
    }

    public static function Create($array, $request)
    {

        $pageArray = $fieldArray = $reqForm = [];

        if (!empty($request->formData)) {
            foreach ($request->formData as $req) {
                $reqForm[$req['name']] = $req['value'];
            }

            if (isset($reqForm) && !empty($reqForm)) {
                foreach ($reqForm as  $key => $value) {
                    if ($key == '_token') {
                    } elseif ($key == 'password') {
                        $hash = Hash::make($value);

                        $fieldArray[$key] = $hash;
                    } else {
                        $fieldArray[$key] = $value;
                    }
                }
            }
        }

        ///////////////////////////////////

        if (isset($array['sql'])) {
            foreach ($array['sql'] as $key => $value) {
                $pageArray[$key] = $value;
            }
        }
        ///////////////////////////////////

        $fieldPlus = array(
            "created_by"    =>  Auth::id(),
            "created_at"    => Carbon::now(),
        );

        ///////////////////////////////////

        $insertArray = array_merge($fieldArray, $fieldPlus, $pageArray);
        $insertRow = DB::table($array['tb_name'])->insert($insertArray);
        $insertId = DB::getPdo()->lastInsertId();

        ///////////////////////////////////

        $reqAjax = json_encode($insertArray);
        $insertLog = array(
            "table_name"      => $array['tb_name'],
            "field_name"      => $reqAjax,
            "row_id"          => $insertId,
            "updated_by"      => Auth::user()->name,
            "updated_at"      => Carbon::now(),
            "operation" => 'insert',
        );


        $insertLog = DB::table('public_operations')->insert($insertLog);

        return $insertId;
    }
    public static function updateOrCreate($array, $request = null, $plusArray = null)
    {

        $pageArray = $fieldArray = $reqForm = [];

        $fieldArray = collect($request)->map(function ($q, $key) {

            if ($key == 'password') {
                return   Hash::make($q);
            } else {
                return $q;
            }
        })->filter(function ($q, $key) {
            return $key !== '_token';
        })->toArray();


        ///////////////////////////////////
        $check_insert = true;
        $check_by = 'id';
        $id = null;
        if (isset($array['sql'])) {
            foreach ($array['sql'] as $key => $value) {
                $pageArray[$key] = $value;
            }
            if (isset($array['sql']['id'])) {
                $check_insert = false;
                $id = intval($array['sql']['id']);

            }
        }
        if (isset($plusArray['check_by'])) {
            $check_by = $plusArray['check_by'];
        }
        if (isset($plusArray['id'])) {
            $check_insert = false;
            $id = $plusArray['id'];
        }
        $operation = 'Update';
        try {
            //code...
            if ($request->is_delete || $request->is_deleted) {
                $operation = 'Delete';
            }
        } catch (\Throwable $th) {
        }
        ///////////////////////////////////w

        $userId = 0;
        if(Auth::user()){
            $userId = Auth::id();
        }

        $fieldPlus = array(
            "created_by"    =>  $userId,
            "created_at"    => Carbon::now(),
        );


        ///////////////////////////////////

        $insertArray = array_merge($fieldArray, $fieldPlus ?? array("created_by" =>  Auth::id()), $pageArray);
        if ($check_insert) {
            $operation = 'insert';
            $insertRow = DB::table($array['tb_name'])->insert($insertArray);
            $insertId = DB::getPdo()->lastInsertId();
        } else {
            $insertRow = DB::table($array['tb_name'])->where($check_by, $id)->first();
            if ($insertRow) {
                $insertRow = DB::table($array['tb_name'])->where($check_by, $id)->update($insertArray);
            } else {
                $insertRow = DB::table($array['tb_name'])->insert($insertArray);

            }
            if(gettype($id) == 'string'){
                $insertId = DB::getPdo()->lastInsertId();

            }else{

                $insertId = $id;
            }
        }

        ///////////////////////////////////

        if(Auth::user()){
            $userId = Auth::user()->name;
        }


        $reqAjax = json_encode($insertArray);
        $insertLog = array(
            "table_name"      => $array['tb_name'],
            "field_name"      => $reqAjax,
            "row_id"          => $insertId,
            "updated_by"      => $userId,
            "updated_at"      => Carbon::now(),
            "operation" => $operation,
        );


        $insertLog = DB::table('public_operations')->insert($insertLog);



        return $insertId;
    }
}
