<?php

namespace App\Http\Controllers\CMS;

use App\Events\ContactUsEvent;
use App\Events\CreateNotificationEvent;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CRUDcontroller;
use Illuminate\Http\Request;
use App\Models\ContactUS;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class ContactUsController extends Controller
{

    public function index()
    {
        $this->setPage();
        $count = ContactUS::where('is_delete',0)->count();
        return $this->setView('admin.contact.index')->with(['count'=>$count]);
    }


    public function create()
    {
        $this->setPage();


        return $this->setView('admin.contact.create');
    }

    public function updateOrCreate(Request $request)
    {

        $this->validate(
            $request,
            [
                'address' => 'string',
                'email' => 'email',
                'phone' => 'string',
                'message' => 'required'
            ]
        );

        $array = [
            'tb_name' => 'contact_us',
        ];




        CRUDcontroller::updateOrCreate($array, $request, null);






        return ['message' => __('Added Success'), 'code' => 204];
    }


    public function inbox_data(Request $request)
    {

        $columns = array(
            0 => 'id',
            1 =>  'address',
            2 => 'phone',
            3 =>  'email',
            4 =>  'message',
            5 =>  'status',
        );

        $totalData = ContactUS::where('row_id', 0)->count();
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order =  $columns[$request->input('order.0.column')];
        $dir =  $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {

            $inboxs = ContactUS::where('row_id', 0)->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)

                ->get();
        } else {
            $search = $request->input('search.value');

            $inboxs = ContactUS::where('row_id', 0)->where(function ($q) use ($search) {
                $q->where('id', $search)
                    // ->orWhere('id', 'LIKE', "%{$search}%")
                    ->orWhere('address', 'LIKE', "%{$search}%")
                    ->orWhere('phone', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%")
                    ->orWhere('message', 'LIKE', "%{$search}%")
                    ->orWhere('status', 'LIKE', "%{$search}%");
            })
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)


                ->get();

            $totalFiltered = ContactUS::where('row_id', 0)->where(function ($q) use ($search) {
                $q->where('id', $search)
                    ->orWhere('id', 'LIKE', "%{$search}%")
                    ->orWhere('address', 'LIKE', "%{$search}%")
                    ->orWhere('phone', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%")
                    ->orWhere('message', 'LIKE', "%{$search}%")
                    ->orWhere('status', 'LIKE', "%{$search}%");
            })
                ->count();
        }
        $data = array();

        if (!empty($inboxs)) {
           $reply =  ContactUS::where('row_id','!=', 0)->get();
            foreach ($inboxs as $key => $inbox) {

                if($inbox->row_id == 0){


                    $nestedData['check'] = $inbox->row_id;
                $nestedData['id'] = " <td>" .
                    $key + 1 .
                    "</td>";

                if ($inbox->email) {
                    $nestedData['phone'] = " <td>" .
                        $inbox->phone .
                        "</td>";

                    $nestedData['email'] = " <td colspan='3'>" .
                        $inbox->email .
                        "</td>";

                    $nestedData['address'] = " <td>" .
                        $inbox->address .
                        "</td>";
                } else {
                    $nestedData['phone'] = '-----';
                    $nestedData['email'] = '-----';
                    $nestedData['address'] = '-----';
                }

                $nestedData['message'] = " <td>" .
                    $inbox->message .
                    "</td>";

                $nestedData['action'] = ' <td class="but-click"><a  href="' . url('admincp/contact-us/reply/?id=' . $inbox->id . '&email=' . $inbox->email) . '" >
                <i class="fa fa-reply" aria-hidden="true"></i>
                  </a></td>';

                $data[] = $nestedData;
                $key_sub = 0 ;

                foreach ($reply as  $sub_inbox) {
                    if($sub_inbox->row_id == $inbox->id){

                        $nestedData['check'] = $sub_inbox->row_id;

                $nestedData['id'] = " <td>" .
                $key_sub ++  .
                "</td>";


                $nestedData['phone'] = '-----';
                $nestedData['email'] = '-----';
                $nestedData['address'] = '-----';


            $nestedData['message'] = " <td>" .
                $sub_inbox->message .
                "</td>";

            $nestedData['action'] = ' <td class="but-click"> 👍 </td>';

            $data[] = $nestedData;

                    }
                }

            }

            }
        }

        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
        );
        echo  json_encode($json_data);
    }

    public function reply(Request $request)
    {
        $id = $request->id;
        $this->setPage();

        $inbox = ContactUS::find($id);

        return $this->setView('admin.contact.reply')->with(compact('inbox'));
    }


    public function replyPost(Request $request)
    {

        $request['row_id'] = $request->row_id;


      $array = [
            'tb_name' => 'contact_us',
            'sql' => [
                'email_reply'=>Auth::user()->email,
            ],


        ];
        $id =  CRUDcontroller::updateOrCreate($array, $request, null);

        $last_insert_contact = ContactUS::query()->find($id);

      $dataNotificationEvent=$last_insert_contact->load('user' );


        if ($last_insert_contact) {

//          event(new ContactUsEvent($last_insert_contact));
            $modename ="contactUS";
       event(new CreateNotificationEvent($dataNotificationEvent,$modename));

        }
        return ['message' => __('Added Success'), 'code' => 204];
    }


    public function chat(){
        $this->setPage();

        $mainContact = ContactUS::where('row_id', 0)->where('is_delete',0)->orderBy('created_at', 'DESC')->with(['user','child'])->get();

//        return ContactUS::query()->leftJoin('contact_us as child', 'child.id', '=', 'contact_us.row_id')
//        ->selectRaw("contact_us.*, (SELECT MAX(child.created_at)) as latest_message_on")
//            ->orderBy("latest_message_on", "DESC")
//            ->get();

        return $this->setView('admin.contact.chatContact')->with(compact(['mainContact']));

    }


    public function showMassage(Request $request){

        $massages = ContactUS::findOrFail($request->id);
       $massages= $massages->load(['user','child']);
         return View::make('admin.contact.parts.chatMassage', compact(['massages']))->render();

    }
}
