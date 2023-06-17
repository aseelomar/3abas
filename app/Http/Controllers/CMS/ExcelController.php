<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\ContactUS;
use App\Models\Coupon;
use App\Models\PaymentsMethods;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Visitor;
use App\Models\Product;
use Rap2hpoutre\FastExcel\FastExcel;

class ExcelController extends Controller
{
    //

    public function index()
    {
        return view('admin.excel');
    }

    public function import(Request $request)
    {
        $users = (new FastExcel)->import($request->file('users'), function ($line) {
            return User::firstOrCreate(
                ['email' => $line['Email']],
                ['name' => $line['Name']],
            );
        });

        return redirect('excel')->with(['success' => "Users imported successfully."]);
    }

    public function export()
    {
        $users = User::where('is_deleted',0)->get();
        return (new FastExcel($users))->download('users.xlsx');
    }

    public function exportOrder()
    {
        $Orders = Order::where('is_delete',0)->get();
        return (new FastExcel($Orders))->download('Orders.xlsx');
    }


    public function exportProducts()
    {
        $Products = Product::where('is_delete',0)->get();
        return (new FastExcel($Products))->download('Products.xlsx');
    }


    public function exportInbox()
    {
        $Inbox = ContactUS::where('is_delete',0)->get();
        return (new FastExcel($Inbox))->download('Inbox.xlsx');
    }

    public function exportCoupon()
    {
        $Coupon = Coupon::all();
        return (new FastExcel($Coupon))->download('Coupon.xlsx');
    }

    public function exportVisitor()
    {
        $Visitor = Visitor::where('status',1)->get();
        return (new FastExcel($Visitor))->download('Visitor.xlsx');
    }
    public function exportPaymentMethod(){
        $payment = PaymentsMethods::where('is_delete', 0)->get();
        return (new FastExcel($payment))->download('PaymentMethod.xlsx');
    }
    public function exportShipment(){
        $shipment = User::where( 'type', '=', 'shipping' )
                        ->where('is_deleted',0)->get();
        return (new FastExcel($shipment))->download('Shipment.xlsx');

    }
    public function exportShipmentOrder(){
        $shipment = User::where( 'type', '=', 'shipping' )
                        ->where('is_deleted',0)->get();
        return (new FastExcel($shipment))->download('Shipment.xlsx');

    }

}
