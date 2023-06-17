<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CRUDcontroller;
use App\Models\Page;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Spatie\Permission\Models\Permission;

class EmployeeController extends Controller
{
    public function users()
    {
        $this->setPage();
        //  $name_of_pages =   Auth::user()->permissions()->pluck('name');

        //   return   $get_pages = Page::where(
        //         function ($q){
        //             if(sizeof(request()->segments()) == 3){
        //                 $q->where('url','users/new');

        //             }elseif(sizeof(request()->segments()) == 2){
        //                 $q->where('url','users/new');
        //             }
        //         }
        //     )->whereIn('title',$name_of_pages)->first();
        //    return  $name_of_pages =   Auth::user()->permissions()->pluck('name');
        //     return $get_pages = Page::where(
        //         function ($q){
        //             if(sizeof(request()->segments()) == 3){
        //                 $q->where('url',request()->segment(3).'/'.request()->segment(2));

        //             }elseif(sizeof(request()->segments()) == 2){
        //                 $q->where('url',request()->segment(2));
        //             }
        //         }
        //     )->whereIn('title',$name_of_pages)->get();
        //     return request()->segment(2).'/'.request()->segment(3);
        // return sizeof(request()->segments());
        // return  $get_pages = Page::where(
        //     function ($q){
        //         if(sizeof(request()->segments()) == 3){
        //             $q->where('url',request()->segment(3).'/'.request()->segment(2));

        //         }elseif(sizeof(request()->segments()) == 2){
        //             $q->where('url',request()->segment(2));
        //         }
        //     }
        // )->first();

        $users = User::where('type', 'admin_emp')->where('is_deleted',0)->with(['permission'])->paginate('20');
        $count = $users->count();
        $pages = Page::orderBy('rank', 'asc')
            ->where('parent_id', 0)
            ->whereNull('type')
            ->where('visible', 1)->get();


        return $this->setView('admin.employee.users')->with(compact('users'))->with(compact('pages'))->with(compact('count'));
    }
    public function userUpdate(Request $request)
    {
        $this->validate(
            $request,
            [
                'email' => 'nullable|email|unique:users,email,' . $request->id,
                'name' => 'nullable|string|max:64',
                'password' => 'nullable|min:6|max:20'
            ]
        );

        $array = [
            'tb_name' => 'users',
            'sql' => [
                'type' => 'admin_emp',
                'id' => $request->id

            ],
        ];
        CRUDcontroller::updateOrCreate($array, $request);
        $data[] = $request->name;
        $data[] = $request->email;
        $mainPages = Page::orderBy('rank', 'asc')
            ->where('parent_id', 0)
            ->where('visible', 1)->count();
        for ($i = 1; $i <= $mainPages; $i++) {

            $data[] = '<td class="but-click">
          <a href="#" page="/users" class="toggle_but">
              <i class="feather icon-x " data-bs-toggle="modal"
                  data-bs-target="#exampleModal"></i>
          </a>
      </td>';
        }
        return ['message' => __('admin.updateSuccess'), 'data' => $data, 'code' => 204];
    }
    public function userStore(Request $request)
    {

        $this->validate(
            $request,
            [
                'email' => 'required|email|unique:users,email',
                'name' => 'required|string|max:64',
                'password' => 'required|min:6|max:20'
            ]
        );
        $array = [
            'tb_name' => 'users',
            'sql' => [
                'type' => 'admin_emp',
                'id' => $request->id,

            ],
        ];
        CRUDcontroller::updateOrCreate($array, $request);
        $data[] = $request->name;
        $data[] = $request->email;
        $user = User::where('email',$request->email)->first();
        $mainPages = Page::orderBy('rank', 'asc')
            ->where('parent_id', 0)
            ->where('visible', 1)->get();
        foreach ($mainPages as $page) {
            $data[] = ' <td class="but-click">
            <a
                onclick="show_edit_user_modal( '.$user->id .' ,  '.$page->id.' )">
                <i class="feather icon-edit "></i>

            </a>
        </td>';
        }
        return ['message' => __('admin.createdSuccess'), 'data' => $data, 'code' => 200];
    }

    /**
     * we will take user_id & main_page
     * main page for sub pages
     * sub_pages for permission
     * get permission named like mainpages + subpages
     *assing permission to user

     */
    public function empPermissions(Request $request)
    {
        $page = Page::where('parent_id', $request->page_id)->get();
        foreach ($page as $pa) {
            Permission::findOrCreate($pa->title, 'web');
        }

        $user = User::where('id', $request->id)->first();

        return View::make('admin.employee.user_permission_edit', compact(['user', 'page']))->render();
    }
    public function syncPermission(Request $request)
    {
        // return $request->all();
        // return array_keys($request->input('hidden_permission'));
        // return array_keys($request->input('permission'));
        $user = User::find($request->user_id);
        foreach ($request->hidden_permission as $key => $permission) {
            $user->revokePermissionTo($key);
        }
        foreach ($request->permission as $key => $permission) {
            $user->givePermissionTo($key);
        }
        // $user->syncPermissions();
        return ['message' => __('admin.permission_success')];
    }
}
