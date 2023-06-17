<?php

namespace App\Http\Controllers\CMS;

use App\Events\CreateNotificationEvent;
use App\Events\RejectOrderEvent;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CRUDcontroller;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\ProductDetails;
use App\Models\Status;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\DataTables;
use function Composer\Autoload\includeFile;

class OrderController extends Controller
{
    public function index()
    {
        $this->setPage();
        $status = Status::visible()->get();
        $count= Order::where('is_delete',0)->count();
        $shipments = User::Where('type','shipping')->where('visible',1)->where('is_deleted',0)->select(['id','name'])->get();

        return $this->setView('admin.orders.index')->with(compact(['status','count','shipments']));
    }
    public function getOrder(){

        $order= Order::where('is_delete',0)->select();

        $count = $order->count();
        $datatable = Datatables::of($order)->setTotalRecords($count);

        $datatable->editColumn('status_id', function ($row) {
            $data['status'] = $row->status_id;
            $data['name']=$row->status->name;
            return view('admin.orders.parts.btnStatus', $data)->render();
        });

        $datatable->editColumn('shipment_id', function ($row) {
                $shipment = User::findOrFail($row->shipment_id);
                return $shipment->name;

        });

        $datatable->editColumn('client_id', function ($row) {
            return $row->user->name;
        });

        $datatable->editColumn('product_id', function ($row) {
            $data['id']=$row->id;
            return view('admin.orders.parts.btnProduct', $data)->render();
        });
        $datatable->editColumn('payment_method_id', function ($row) {
                        return $row->paymentMethod->name;
        });


        $datatable->editColumn('transfer_at', function ($row) {
            if($row->transfer_at !== null)
            {
                return Carbon::parse( $row->transfer_at )->toDateTimeString();
            }
            return " لم يتم التحويل من الأدمن";
        });

        $datatable->editColumn('created_at', function ($row) {

                return Carbon::parse( $row->created_at )->toDateTimeString();

        });

        $datatable->addColumn('actions', function ($row) {
            $data['status'] = $row->status_id;
            $data['id']=$row->id;
            $data['shipment_id']=$row->shipment_id;
            return view('admin.orders.parts.action', $data)->render();
        });

        $datatable->filter(function ($query) {
            if (request()->has('active') && !is_null(request('active'))) {
                $query->where('status_id', request('active'));
            }

            if (request()->has('number') && !is_null(request('number'))) {
                $search =request('number');

                $query->where('number_order', 'like', "%" . request('number') . "%")
                    ->orWhere('country', 'like', "%" . request('number') . "%")
                    ->where('is_delete',0)
                    ->orWhere('phone', 'like', "%" . request('number') . "%")
                    ->where('is_delete',0)
                       ->orWhereHas('shipment',function ($query) use($search) {
                           $query->where( 'name', 'like',"%" . $search . "%" );
                       })
                    ->where('is_delete',0)
                       ->orWhereHas('user',function ($query) use($search) {
                           $query->where( 'name', 'like',"%" . $search . "%" );
                       })
                    ->where('is_delete',0)
                       ->orWhereHas('paymentMethod',function ($query) use($search) {
                           $query->where( 'title_ar', 'like',"%" . $search . "%" )
                               ->orWhere('title_en', 'like',"%" . $search . "%")
                           ;
                       })
                    ->where('is_delete',0);

            }



        }, true);

        $datatable->setRowId(function ($row) {
            return $row->id;
        });

        $datatable->escapeColumns(['*']);

        return $datatable->make(true);

    }


    public function accept()
    {
        $this->setPage();
         return $this->setView('admin.orders.accept');
    }
    public function send()
    {
        $this->setPage();
        return $this->setView('admin.orders.send');
    }
    public function status(Request $request)
    {

      $id= $request->id;
       $order = Order::findOrFail($id);
        try
        {

            DB::beginTransaction();

       if($request->status_id == Status::STATUS_ACCEPT){

           $status = Status::STATUS_SENT_SHIPMENT;
           $shpment = $request->shipment_id;

        }elseif($request->status_id == Status::STATUS_REJECT){


           $request->validate([
                                  'status_id' => 'required',
                                  'note'     => 'required',

                              ]);
           $status = Status::STATUS_REJECT;
       }


        $user =Auth::user();
       if($user->type === 'admin'){

           $array = [
            'tb_name' => 'orders',
            'sql' => [
                'id' => $id,
                'status_id'=>$status,
                'transfer_at'=>Carbon::now(),
                'created_at'=>$order->created_at,
                'note'=>$request->note ??$order->note,
                'created_by'=>Auth::id(),
                'shipment_id'=>$request->shipment_id ?? $order->shipment_id,

            ],
        ];
          $update =  CRUDcontroller::updateOrCreate($array);
       }



            $array    = [
                'tb_name' => 'order_tracking',
                'sql'     => [

                    'order_id'              => $id,
                    'status_id'             =>$status,
                    'created_by'            => Auth::id(),

                ],
            ];

            CRUDcontroller::updateOrCreate( $array );

        if($status == Status::STATUS_REJECT && $update )
        {
            $order = Order::findOrFail($update);

           $order= $order->load('user');
            $modename ="orderReject";
//            event(new RejectOrderEvent($order));
             event(new CreateNotificationEvent($order,$modename));

            $orderProduct =OrderProduct::where('order_id',$request->id)->with('cart.product.details')->get();
            foreach ($orderProduct as $item){
                if($item->cart->color_id == null){
                    $count = $item->cart->product->inventory + $item->cart->count;
                    $array1 = [
                        'tb_name' => 'products',
                        'sql'=> [
                            'id'      => $item->cart->product->id,
                            'inventory'    => $count,
                            'updated_at' => Carbon::now(),
                            'created_by'    => Auth::user()->id,
                            'best_seller'    => $item->cart->product->best_seller-$item->cart->count,
                        ],
                    ];

                    CRUDcontroller::updateOrCreate( $array1 );

                }elseif($item->cart->color_id !== null && $item->cart->size !== null){
                    $product = ProductDetails::where('product_id',$item->cart->product_id)->where('color_id',$item->cart->color_id)->where('size',$item->cart->size)->first();
                    if($product) {
                        $count = $product->count + $item->cart->count;

                        $product->count = $count  ;
                        $product->save();
                    }
                    $array1 = [
                        'tb_name' => 'products',
                        'sql'=> [
                            'id'      => $item->cart->product->id,
                            'best_seller'    => $item->cart->product->best_seller - $item->cart->count,
                        ],
                    ];

                    CRUDcontroller::updateOrCreate( $array1 );

                }
            }

        }
            DB::commit();

        } catch ( \Throwable $e )
        {

            DB::rollback();

        }
        if ($update) {
            return ['message' => __('admin.update_success'), 'code' => 200];
        }
    }

    public function showOrderProduct(Request $request){
        $order = Order::findOrFail($request->id);

       $products=  $order->load(['orderProduct.cart'=>function($q){
                                $q->with(['color','product.mainPhoto']);
                             }]);

        return View::make('admin.orders.parts.product', compact(['products']))->render();
    }


    public function  getOrdersSentShipping(){
        $this->setPage();
       $order= Order::where('status_id',Status::STATUS_SENT_SHIPMENT)->with(['user'=> function($q){
                                                                            $q->select(['id','name']);},
                                                                              'status'
                                                                            ,'shipment'=> function($q){
                                                                            $q->select(['id','name']);},])
                                                                             ->where('is_delete',0)->orderBy('created_at', 'DESC')->GET();
        return $this->setView('admin.orders.send')->with(compact(['order']));
    }



    public function  getOrdersDelivery(){
        $this->setPage();
       $order= Order::where('status_id',Status::STATUS_DELIVERY)->with(['user'=> function($q){
                                                                            $q->select(['id','name']);},
                                                                              'status'
                                                                            ,'shipment'=> function($q){
                                                                            $q->select(['id','name']);},])
                                                                             ->where('is_delete',0)->orderBy('created_at', 'DESC')->GET();
        return $this->setView('admin.orders.accept')->with(compact(['order']));
    }
}
