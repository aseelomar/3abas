<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\PaymentsMethods;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class PaymentsMethodController extends Controller
{
    public function index()
    {
        $this->setPage();
        $payment = PaymentsMethods::where('is_delete', 0)->get();
      //  $payments = PaymentsMethods::where('is_delete',0)->get();

        return $this->setView('admin.paymentsMethod.view')->with(compact('payment'));
    }

    public function add()
    {
        $this->setPage();

        return $this->setView('admin.paymentsMethod.add');

    }

    public function getPayment()
    {
        $payment = DB::table('payments_methods')
            ->where('is_delete','=',0)
            ;
        //$payment = PaymentsMethods::query();

        $count = $payment->count();

        $datatable = Datatables::of($payment)->setTotalRecords($count);

        $datatable->editColumn('visible', function ($row) {
            $data['active'] = $row->visible;
            $data['id'] = $row->id;

            return view('admin.paymentsMethod.parts.status', $data)->render();
        });




        $datatable->editColumn('created_at', function ($row) {
            return Carbon::parse($row->created_at)->diffForHumans();
        });

        $datatable->addColumn('actions', function ($row) {
            $data['id'] = $row->id;

            return view('admin.paymentsMethod.parts.actions', $data)->render();
        });

        $datatable->filter(function ($query) {
            if (request()->has('title')) {
                $query->where('title_ar', 'like', "%" . request('title') . "%")
                ->orWhere('title_en', 'like', "%" . request('title') . "%");
            }

//            if (request()->has('active') && !is_null(request('active'))) {
//
//                $query->where('visible','=', request('active'));
//            }

            if (request()->has('deleted') && !is_null(request('deleted'))) {
                $query->where('is_delete', request('deleted'));
            }



        }, true);

        $datatable->setRowId(function ($row) {
            return $row->id;
        });

        $datatable->escapeColumns(['*']);

        return $datatable->make(true);


    }

    public function store(Request $request)
    {
        $request->validate([
            'title_ar' => 'required|string',
            'title_en' => 'required|string',
            'value' => 'required',
            'rank' => 'required|integer',
            'visible' => 'required',
        ]);


        $payment = PaymentsMethods::create([
            'title_ar' => $request->title_ar,
            'title_en' => $request->title_en,
            'value' => $request->value,
            'rank' => $request->rank,
            'visible' => $request->visible,
            'created_by' => Auth::id(),
        ]);
//        if(!$payment){
//            return ['message' => __('admin.error_create'), 'code' => 500];
//        }
        return ['message' => __('admin.created-success'), 'code' => 200];

    }

    public function status(Request $request)
    {


        $id = $request->id;
        $updateStatus = PaymentsMethods::findOrFail($id);
        $updateStatus->update([
            'visible' => !$updateStatus->visible
        ]);
        $saved = $updateStatus->save();
        if ($saved) {
            return ['message' => __('admin.update_success'), 'code' => 200];
        }
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $delete = PaymentsMethods::findOrFail($id);
        $delete->update([
            'is_delete' => 1,
        ]);
//        if (!$delete) {
//            return $this->respondGeneral(true, 500, trans('حدث خطأ'), null, null);
//        }

        return ['message' => __('admin.delete_success'), 'code' => 200];


    }

    public function edit(Request $request)
    {
        $this->setPage();
        $id = $request->id;
        $payment = PaymentsMethods::findOrFail($id);
        return $this->setView('admin.paymentsMethod.edit')->with(compact(['payment']));
    }

    public function update(Request $request)
    {
        $id = $request->id;

        $request->validate([
            'title_ar' => 'required|string',
            'title_en' => 'required|string',
            'value' => 'required',
            'rank' => 'required|integer',
            'visible' => 'required',
        ]);

        $payment = PaymentsMethods::findOrFail($id);


        $payment = $payment->update([
            'title_ar' => $request->title_ar,
            'title_en' => $request->title_en,
            'value' => $request->value,
            'rank' => $request->rank,
            'visible' => $request->visible,

        ]);

        return ['message' => __('admin.created-success'), 'code' => 200, 'path' => route('paymentsMethod.all')];

    }
}
