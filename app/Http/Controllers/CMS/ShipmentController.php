<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CRUDcontroller;
use App\Http\Requests\UploadInvoiceImageRequest;
use App\Models\Country;
use App\Models\Order;
use App\Models\Shipment;
use App\Models\Status;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rule;
use Rap2hpoutre\FastExcel\FastExcel;
use Yajra\DataTables\DataTables;

class ShipmentController extends Controller
{

    public function index()
    {
        $this->setPage();
        $count = User::where( 'type', '=', 'shipping' )
                     ->where( 'is_deleted', 0 )->count();

        return $this->setView( 'admin.shipment.view' )->with( compact( 'count' ) );
    }

    public function getShipment()
    {

        $shipment = User::where( 'type', '=', 'shipping' )
                        ->where( 'is_deleted', 0 )->select();

        $count     = $shipment->count();
        $datatable = Datatables::of( $shipment )->setTotalRecords( $count );

        $datatable->editColumn( 'active', function ( $row ) {
            $data['active'] = $row->visible;
            $data['id']     = $row->id;

            return view( 'admin.shipment.parts.status', $data )->render();
        } );
        $datatable->editColumn( 'country_id', function ( $row ) {
            return $row->country->country_name ?? null;
        } );
        $datatable->editColumn( 'created_at', function ( $row ) {

            return Carbon::parse( $row->created_at )->diffForHumans();
        } );

        $datatable->addColumn('wallet', function ($row) {
            $id         = $row->id;

            $walletTotal = Order::where( 'shipment_id', $id )
                                      ->where( 'status_id', '=', Status::STATUS_DELIVERY )
                                      ->where( 'is_delete', 0 )
                                      ->whereHas( 'orderTracking', function ( $query ) {
                                          $query->where( 'status_id', Status::STATUS_DELIVERY );
                                      } )
                                      ->orderBy( 'created_at', 'DESC' )->sum('total');

            return $walletTotal;
        });

        $datatable->addColumn('actions', function ($row) {
            $data['id']=$row->id;
            return view('admin.shipment.parts.actions', $data)->render();
        });

        $datatable->filter( function ( $query ) {
            if ( request()->has( 'companyName' ) )
            {
                $query->where( 'name', 'like', "%" . request( 'companyName' ) . "%" );
            }

            if ( request()->has( 'active' ) && ! is_null( request( 'active' ) ) )
            {
                $query->where( 'status', request( 'active' ) );
            }

        }, true );

        $datatable->setRowId( function ( $row ) {
            return $row->id;
        } );

        $datatable->escapeColumns( [ '*' ] );

        return $datatable->make( true );
    }

    public function add()
    {
        $this->setPage();
        $country = Country::get();

        return $this->setView( 'admin.shipment.add' )->with( compact( 'country' ) );
    }

    public function store( Request $request )
    {

        $request->validate( [
                                'name'       => 'required|string|unique:shipments',
                                'country_id' => 'nullable|string',
                                'mobile'     => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:9',
                                'email'      => 'required|email|unique:users,email',
                                'password'   => 'required|min:6|max:20',

                            ] );

        $array = [
            'tb_name' => 'users',
            'sql'     => [
                'id'   => $request->id ?? null,
                'type' => 'shipping',
            ],
        ];
        CRUDcontroller::updateOrCreate( $array, $request );

        return [ 'message' => __( 'admin.created-success' ), 'code' => 200 ];

    }

    public function status( Request $request )
    {
        $id           = $request->id;
        $updateStatus = User::findOrFail( $id );
        $stauts       = ! $updateStatus->visible;

        $array = [
            'tb_name' => 'users',
            'sql'     => [
                'id'         => $id,
                'visible'    => $stauts,
                'created_by' => Auth::id(),
                'created_at' => $updateStatus->created_at,

            ],
        ];

        CRUDcontroller::updateOrCreate( $array, $updateStatus, null );

        $saved = $updateStatus->save();
        if ( $saved )
        {
            return [ 'message' => __( 'admin.update_success' ), 'code' => 200 ];
        }
    }

    public function edit( Request $request )
    {
        $this->setPage();
        $id = $request->id;

        $shipment = User::findOrFail( $id );
        $country  = Country::get();

        return $this->setView( 'admin.shipment.edit' )->with( compact( [ 'shipment', 'country' ] ) );
    }
//    public function update(Request $request){
//
//        $request->validate([
//                               'name' => 'required|string', Rule::unique('shipments')->ignore($request->id),
//                               'country' => 'required|string',
//                               'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:9',
//
//                           ]);
//
//        $array = [
//            'tb_name' => 'shipments',
//            'sql' => [
//                'id' => $request->id,
//
//            ],
//        ];
//        CRUDcontroller::updateOrCreate($array, $request);
//
//        return ['message' => __('admin.created-success'), 'code' => 200,'path' => route('shipment.all')];
//
//    }
    public function shipmentOrder( Request $request )
    {
        $this->setPage();
        $shipment = Auth::user();

        $status = Status::visible()->get();

        return $this->setView( 'admin.shipment.shipmentOrder' )->with( compact( [ 'shipment', 'status' ] ) );

    }

    public function getShipmentOrder()
    {
        $status = [
            Status::STATUS_ACCEPT,
            Status::STATUS_REJECT,
            Status::STATUS_PENDING,
            Status::STATUS_CANCEL_FROM_USER,
        ];
        $id     = Auth::id();

        $order = Order::where( 'shipment_id', $id )->where( 'is_delete', 0 )
                      ->whereNotIn( 'status_id', $status )->select();
        $count = $order->count();

        $datatable = Datatables::of( $order )->setTotalRecords( $count );

        $datatable->editColumn( 'status_id', function ( $row ) {
            $data['status'] = $row->status_id;
            $data['name']   = $row->status->name;

            return view( 'admin.orders.parts.btnStatus', $data )->render();
        } );

        $datatable->editColumn( 'client_id', function ( $row ) {
            return $row->user->name;
        } );

        $datatable->editColumn( 'product_id', function ( $row ) {
            $data['id'] = $row->id;

            return view( 'admin.shipment.parts.btnProduct', $data )->render();
        } );
        $datatable->editColumn( 'payment_method_id', function ( $row ) {
            return $row->paymentMethod->name;
        } );

        $datatable->editColumn( 'created_at', function ( $row ) {


            return Carbon::parse( $row->created_at )->toDateTimeString();

        } );

        $datatable->addColumn( 'actions', function ( $row ) {
            $data['status'] = $row->status_id;
            $data['id']     = $row->id;

            return view( 'admin.shipment.parts.actionOrderShipment', $data )->render();
        } );

        $datatable->filter( function ( $order ) {

            if ( request()->has( 'active' ) && ! is_null( request( 'active' ) ) )
            {
                $order->where( 'status_id', request( 'active' ) );
            }

            if ( request()->has( 'number' ) && ! is_null( request( 'number' ) ) )
            {
                $search = request( 'number' );
                $status = [
                    Status::STATUS_ACCEPT,
                    Status::STATUS_REJECT,
                    Status::STATUS_PENDING,
                    Status::STATUS_CANCEL_FROM_USER,
                ];

                $order->where( 'number_order', 'like', "%" . $search . "%" )
                      ->orWhere( 'country', 'like', "%" . $search . "%" )
                      ->where( 'shipment_id', Auth::user()->id )
                      ->where( 'is_delete', 0 )
                      ->whereNotIn( 'status_id', $status )
                      ->orWhere( 'phone', 'like', "%" . $search . "%" )
                      ->where( 'shipment_id', Auth::user()->id )
                      ->where( 'is_delete', 0 )
                      ->whereNotIn( 'status_id', $status )
                      ->orWhereHas( 'user', function ( $query ) use ( $search ) {
                          $query->where( 'name', 'like', "%" . $search . "%" );
                      } )
                      ->where( 'shipment_id', Auth::user()->id )
                      ->where( 'is_delete', 0 )
                      ->whereNotIn( 'status_id', $status )
                      ->orWhereHas( 'paymentMethod', function ( $query ) use ( $search ) {

                          $query->where( 'title_ar', 'like', "%" . $search . "%" )
                                ->orWhere( 'title_en', 'like', "%" . $search . "%" );
                      } )
                      ->where( 'shipment_id', Auth::user()->id )
                      ->where( 'is_delete', 0 )
                      ->whereNotIn( 'status_id', $status );

            }

        }, true );

        $datatable->setRowId( function ( $row ) {
            return $row->id;
        } );

        $datatable->escapeColumns( [ '*' ] );

        return $datatable->make( true );

    }

    public function updateOrderStatue( Request $request )
    {
        $id           = $request->id;
        $updateStatus = Order::findOrFail( $id );

        if ( $request->status == Status::STATUS_PREPARATION )
        {
            $status = Status::STATUS_PREPARATION;
            $array  = [
                'tb_name' => 'orders',
                'sql'     => [
                    'id'          => $id,
                    'status_id'   => $status,
                    'transfer_at' => now(),
                    'updated_at'  => now(),

                ],
            ];
            CRUDcontroller::updateOrCreate( $array, null, null );

        } else if ( $request->status == Status::STATUS_CANCEL )
        {
            $status = Status::STATUS_CANCEL;
            $array  = [
                'tb_name' => 'orders',
                'sql'     => [
                    'id'          => $id,
                    'status_id'   => $status,
                    'transfer_at' => now(),
                    'updated_at'  => now(),

                ],
            ];
            CRUDcontroller::updateOrCreate( $array, null, null );

        }
        $array = [
            'tb_name' => 'order_tracking',
            'sql'     => [

                'order_id'   => $id,
                'status_id'  => $status,
                'created_by' => Auth::id(),

            ],
        ];

        CRUDcontroller::updateOrCreate( $array );

        return [ 'message' => __( 'admin.update_success' ), 'code' => 200 ];

    }

    public function deliveryOrderStatue( UploadInvoiceImageRequest $request )
    {

        $updateStatus = Order::findOrFail( $request->id );

        $image = $request->file( 'image' );

        $name = $updateStatus->number_order . '_' . $image->getClientOriginalName();
        $image->move( 'images/order/', $name );

        $array = [
            'tb_name' => 'orders',
            'sql'     => [

                'id'         => $request->id,
                'status_id'  => Status::STATUS_DELIVERY,
                'image'      => $name,
                'created_at' => $updateStatus->created_at,
            ],
        ];

        $save  = CRUDcontroller::updateOrCreate( $array, $request->except( 'image' ) );
        $array = [
            'tb_name' => 'order_tracking',
            'sql'     => [

                'order_id'   => $request->id,
                'status_id'  => Status::STATUS_DELIVERY,
                'created_by' => Auth::id(),

            ],
        ];

        CRUDcontroller::updateOrCreate( $array );
        if ( $save )
        {
            return response()->json( [
                                         'message' => 'admin.update_success',

                                     ], 200 );

        }

    }

    public function walletShipment()
    {
        $this->setPage();
        $id     = Auth::id();

        $wallet =  $wallet = Order::where( 'shipment_id', $id )
                                  ->where( 'status_id', '=', Status::STATUS_DELIVERY )
                                  ->where( 'is_delete', 0 )
                                  ->whereHas( 'orderTracking', function ( $query ) {
                                      $query->where( 'status_id', Status::STATUS_DELIVERY );
                                  } )
                                  ->orderBy( 'created_at', 'DESC' )->get();

        $total = $wallet->sum( 'total' );

        return $this->setView( 'admin.shipment.walletShipment' )->with( compact( [ 'wallet', 'total' ] ) );
    }


    public function showOrderProduct( Request $request )
    {

        $order = Order::findOrFail( $request->id );

        $products=  $order->load(['orderProduct.cart'=>function($q){
            $q->with(['color','product.mainPhoto']);
        }]);
        return View::make( 'admin.shipment.parts.product', compact( [ 'products' ] ) )->render();
    }

    public function exportShipmentOrder()
    {
        $status = [
            Status::STATUS_ACCEPT,
            Status::STATUS_REJECT,
            Status::STATUS_PENDING,
            Status::STATUS_CANCEL_FROM_USER,
        ];
        $id     = Auth::id();

        $order = Order::where( 'shipment_id', $id )->where( 'is_delete', 0 )
                      ->whereNotIn( 'status_id', $status )->get();

        return ( new FastExcel( $order ) )->download( 'ShipmentOrder.xlsx' );

    }

    public function chartShipmentOrder()
    {
        $this->setPage();
        $id       = Auth::id();
        $dateFrom = Carbon::now()->subMonths( 6 );
        $dateTo   = Carbon::now();

        $order =    Order::where( 'shipment_id', $id )->where( 'orders.status_id', Status::STATUS_DELIVERY )->where( 'is_delete', 0 )
             ->leftJoin( 'order_tracking', function ( $query ) use ( $dateFrom, $dateTo ) {
                 $query->on( 'orders.id', '=', 'order_tracking.order_id' )
                       ->where( 'order_tracking.status_id', Status::STATUS_DELIVERY )
                       ->whereDate( 'order_tracking.created_at', '<=', $dateTo )->whereDate( 'order_tracking.created_at', '>=', $dateFrom );
             } )
             ->select(
                 DB::raw( "SUM(total) as count" ),
                 DB::raw( "DATE_FORMAT(order_tracking.created_at, '%Y') year" ),
                 DB::raw( 'MONTH(order_tracking.created_at) months' ),
                 DB::raw( "MONTHNAME(order_tracking.created_at) as month_name" ) )
             ->groupBy( DB::raw( "Month(order_tracking.created_at)" ) )
             ->orderBy( 'year', 'ASC' )
             ->orderBy( 'months', 'ASC' )
             ->get()->filter( function ( $value ) { return ! is_null( $value->month_name ); } )->keyBy( function ( $item ) {
                return $item->month_name . '-' . $item->year;
            } );
        $labels = $order->keys();
        $data   = $order->pluck( 'count' )->toArray();
        $wallet = Order::where( 'shipment_id', $id )
                       ->where( 'status_id', '=', Status::STATUS_DELIVERY )
                       ->where( 'is_delete', 0 )
                       ->whereHas( 'orderTracking', function ( $query ) use ( $dateFrom, $dateTo ) {
                           $query->where( 'status_id', Status::STATUS_DELIVERY );
                       } )
                       ->orderBy( 'created_at', 'DESC' )->get();

        $total    = $wallet->sum( 'total' );
        $dateFrom = $dateFrom->format( 'Y-m-d' );
        $dateTo   = $dateTo->format( 'Y-m-d' );

        return $this->setView( 'admin.shipment.chartWalletShipment' )->with( compact( [
                                                                                          'data',
                                                                                          'labels',
                                                                                          'total',
                                                                                          'dateFrom',
                                                                                          'dateTo',
                                                                                          'id'
                                                                                      ] ) );
    }
    public function chartShipment(Request $request)
    {
        $this->setPage();

        $id       = $request->id;
        $dateFrom = Carbon::now()->subMonths( 6 );
        $dateTo   = Carbon::now();

        $order =    Order::where( 'shipment_id', $id )->where( 'orders.status_id', Status::STATUS_DELIVERY )->where( 'is_delete', 0 )
                         ->leftJoin( 'order_tracking', function ( $query ) use ( $dateFrom, $dateTo ) {
                             $query->on( 'orders.id', '=', 'order_tracking.order_id' )
                                   ->where( 'order_tracking.status_id', Status::STATUS_DELIVERY )
                                   ->whereDate( 'order_tracking.created_at', '<=', $dateTo )->whereDate( 'order_tracking.created_at', '>=', $dateFrom );
                         } )
                         ->select(
                             DB::raw( "SUM(total) as count" ),
                             DB::raw( "DATE_FORMAT(order_tracking.created_at, '%Y') year" ),
                             DB::raw( 'MONTH(order_tracking.created_at) months' ),
                             DB::raw( "MONTHNAME(order_tracking.created_at) as month_name" ) )
                         ->groupBy( DB::raw( "Month(order_tracking.created_at)" ) )
                         ->orderBy( 'year', 'ASC' )
                         ->orderBy( 'months', 'ASC' )
                         ->get()->filter( function ( $value ) { return ! is_null( $value->month_name ); } )->keyBy( function ( $item ) {
                return $item->month_name . '-' . $item->year;
            } );
        $labels = $order->keys();
        $data   = $order->pluck( 'count' )->toArray();
        $wallet = Order::where( 'shipment_id', $id )
                       ->where( 'status_id', '=', Status::STATUS_DELIVERY )
                       ->where( 'is_delete', 0 )
                       ->whereHas( 'orderTracking', function ( $query ) use ( $dateFrom, $dateTo ) {
                           $query->where( 'status_id', Status::STATUS_DELIVERY );
                       } )
                       ->orderBy( 'created_at', 'DESC' )->get();

        $total    = $wallet->sum( 'total' );
        $dateFrom = $dateFrom->format( 'Y-m-d' );
        $dateTo   = $dateTo->format( 'Y-m-d' );

        return $this->setView( 'admin.shipment.chartWalletShipment' )->with( compact( [
                                                                                          'data',
                                                                                          'labels',
                                                                                          'total',
                                                                                          'dateFrom',
                                                                                          'dateTo',
                                                                                          'id'
                                                                                      ] ) );
    }

    public function chartfilterShipmentOrder( Request $request )
    {
        if($request->has('id')){
           $id = $request->id;
        }else{
           $id = Auth::id();
        }

        $request->validate( [
                                'dateFrom'   => 'required|date',
                                'dateTo' => 'required|date|after_or_equal:dateFrom',

                            ] );
        $dateFrom = Carbon::parse( $request['dateFrom'] )->format( 'Y-m-d' );

        $dateTo   = Carbon::parse( $request['dateTo'] )->format( 'Y-m-d' );

        $order = Order::where( 'shipment_id', $id )->where( 'orders.status_id', Status::STATUS_DELIVERY )->where( 'is_delete', 0 )
                             ->leftJoin( 'order_tracking', function ( $query ) use ( $dateFrom, $dateTo ) {
                                 $query->on( 'orders.id', '=', 'order_tracking.order_id' )
                                       ->where( 'order_tracking.status_id', Status::STATUS_DELIVERY )
                                       ->whereDate( 'order_tracking.created_at', '<=', $dateTo )->whereDate( 'order_tracking.created_at', '>=', $dateFrom );
                             } )
                             ->select(
                                       DB::raw( "SUM(total) as count" ),
                                       DB::raw( "DATE_FORMAT(order_tracking.created_at, '%Y') year" ),
                                       DB::raw( 'MONTH(order_tracking.created_at) months' ),
                                       DB::raw( "MONTHNAME(order_tracking.created_at) as month_name" ) )
                             ->groupBy( DB::raw( "Month(order_tracking.created_at)" ) )
                             ->orderBy( 'year', 'ASC' )
                             ->orderBy( 'months', 'ASC' )
                             ->get()->filter( function ( $value ) { return ! is_null( $value->month_name ); } )->keyBy( function ( $item ) {
                return $item->month_name . '-' . $item->year;
            } );

//        return $order;

        $labels = $order->keys();
        $data   = $order->pluck( 'count' )->toArray();
        $wallet = Order::where( 'shipment_id', $id )
                       ->where( 'status_id', '=', Status::STATUS_DELIVERY )
                       ->where( 'is_delete', 0 )
                      ->whereHas( 'orderTracking', function ( $query )  {
                          $query->where( 'status_id', Status::STATUS_DELIVERY );

                         } )
                       ->orderBy( 'created_at', 'DESC' )->get();
        $labels = $order->keys();


      $total    = $wallet->sum( 'total' );
        $data  = $order->pluck( 'count' )->toArray();

        return [
            'labels' => $labels,
            'data'   => $data,
            'total'  => $total,
//            'order'  => $order,

        ];
    }

}
