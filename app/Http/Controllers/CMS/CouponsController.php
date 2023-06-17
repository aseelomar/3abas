<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\CouponProduct;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;
use Yajra\DataTables\DataTables;

class CouponsController extends Controller
{

    public function index()
    {
        $this->setPage();
        $coupon = Coupon::all();
        $count = $coupon->count();

        return $this->setView('admin.coupons.view')->with(compact('coupon','count'));
    }

    public function getCoupons()
    {

        $coupon = Coupon::query();

        $count = $coupon->count();
        $datatable = Datatables::of($coupon)->setTotalRecords($count);

        $datatable->editColumn('active', function ($row) {
            $data['active'] = $row->status;
            $data['id'] = $row->id;

            return view('admin.coupons.parts.status', $data)->render();
        });


        $datatable->editColumn('user_id', function ($row) {
            return $row->user->name;
        });


        $datatable->editColumn('created_at', function ($row) {
            return $row->created_at->diffForHumans();
        });
        $datatable->editColumn('start_date', function ($row) {
            return $row->start_date->format('Y-m-d');
        });
        $datatable->editColumn('end_date', function ($row) {
            return $row->end_date->format('Y-m-d');
        });

        $datatable->addColumn('actions', function ($row) {
            $data['id'] = $row->id;

            return view('admin.coupons.parts.actions', $data)->render();
        });
          $datatable->filter(function ($query) {
            if (request()->has('code')) {
                $query->where('code', 'like', "%" . request('code') . "%");
            }

            if (request()->has('active') && !is_null(request('active'))) {
                $query->where('status', request('active'));
            }

        }, true);

        $datatable->setRowId(function ($row) {
            return $row->id;
        });

        $datatable->escapeColumns(['*']);

        return $datatable->make(true);


    }

    public function add()
    {
        $this->setPage();
        $products = Product::select(['id', 'serial_number'])->get();

        return $this->setView('admin.coupons.add')->with(compact('products'));
    }

    public function edit(Request $request)
    {
        $this->setPage();
        $id= $request->id;

        $products = Product::select(['id', 'serial_number'])->get();
        $coupon = Coupon::findOrFail($id);
        $couponProducts = CouponProduct::where('coupon_id', $coupon->id)->pluck('product_id')->toArray();

        return $this->setView('admin.coupons.edit')->with(compact(['products', 'coupon', 'couponProducts']));
    }

    public function store(Request $request)
    {

        $request->validate([
            'code' => 'required|string|unique:coupons',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'number' => 'required|numeric',
            'value' => 'required',
            'status' => 'required',
            'type'=>'required|array|min:1',
            'type.*'=>'numeric',

        ]);


        try {
            DB::beginTransaction();

            $copone = Coupon::create([
                'code' => $request->code,
                'end_date' => Carbon::parse($request['end_date'])->format('Y-m-d'),
                'start_date' => Carbon::parse($request['start_date'])->format('Y-m-d'),
                'status' => $request->status,
                'number' => $request->number,
                'type_value' => $request->type_value_coupons,
                'value' => $request->value,
                'user_id' => Auth::id(),
            ]);
            $couponId = $copone->id;
            if ($request->type){
                foreach ($request->type as $type) {
                    $productCoup = CouponProduct::create([
                        'coupon_id' => $couponId,
                        'product_id' => $type,
                    ]);
                }
            }
            DB::commit();

        } catch (Throwable $e) {
            DB::rollback();
        }

//        return $this->respondGeneral(true, 200, trans('alert.success'), trans('messages.add'), null,null);
        return ['message' => __('admin.created-success'), 'code' => 200, 'path' => route('coupons.all')];


    }

    public function status(  Request $request)
    {

        $id= $request->id;
        $updateStatus = Coupon::findOrFail($id);
        $updateStatus->update([
            'status' => !$updateStatus->status
        ]);
        $saved = $updateStatus->save();
        if ($saved) {
            return ['message' => __('admin.update_success'), 'code' => 200];
        }
    }

    public function delete(Request $request)
    {
        $id= $request->id;
        $delete = Coupon::findOrFail($id)->delete();
//        if (!$delete) {
//            return $this->respondGeneral(true, 500, trans('حدث خطأ'), null, null);
//        }

        return ['message' => __('admin.delete_success'), 'code' => 200];


    }

    public function update(Request $request)
    {
        $id= $request->id;

        $request->validate([
            'id'=>'required|exists:coupons,id',
            'code' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'number' => 'required|numeric',
            'type_value_coupons' => 'required',
            'status' => 'required',
            'type'=>'required|array|min:1',
            'type.*'=>'numeric',

        ]);

        try {
            DB::beginTransaction();

            $copone =Coupon::findOrFail($id);
            $copone = $copone->update([
                'code' => $request->code,
                'end_date' => Carbon::parse($request['end_date'])->format('Y-m-d'),
                'start_date' => Carbon::parse($request['start_date'])->format('Y-m-d'),
                'status' => $request->status,
                'number' => $request->number,
                'type_value' => $request->type_value_coupons,
                'value' => $request->value,
                'updated_at	'=>now(),

            ]);
//           $copunProduct = CouponProduct::where('coupon_id',$id)->get();
            if ($request->type){
                foreach ($request->type as $type) {
                    $productCoup = CouponProduct::query()
                        ->where('coupon_id',$id)->updateOrCreate([
                            'coupon_id' => $id,
                            'product_id' => $type,
                        ]);
                }
            }

            DB::commit();

        } catch (Throwable $e) {
          DB::rollback();
        }

//        return $this->respondGeneral(true, 200, trans('alert.success'), trans('messages.add'), null,null);
        return ['message' => __('admin.created-success'), 'code' => 200, 'path' => route('coupons.all')];

    }

    public function show(Request $request)
    {
        $this->setPage();
        $id= $request->id;
        $products = Product::select(['id', 'serial_number'])->get();
        $coupon = Coupon::findOrFail($id);
        $couponProducts = CouponProduct::where('coupon_id', $coupon->id)->pluck('product_id')->toArray();

        return $this->setView('admin.coupons.show')->with(compact(['products', 'coupon', 'couponProducts']));
    }
}
