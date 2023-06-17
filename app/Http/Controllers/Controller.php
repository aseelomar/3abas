<?php

namespace App\Http\Controllers;

use App\Models\Confiq;
use App\Models\Page;
use App\Models\UserPage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use App\Traits\ResponseTrait;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests ,ResponseTrait;

    protected $mainPages;
    protected $subPages;

    public function setPage()
    {
        $user = Auth::user();
        $userId = $user->id;
        if ($user->type == 'admin') {
            $this->mainPages = Page::orderBy('rank', 'asc')
                ->where('parent_id', 0)
                ->where('visible', 1)->where('type',null);

            $this->subPages = Page::orderBy('rank', 'asc')->wherenull('type')
                ->where('visible', 1);
            $this->mainPages    = $this->mainPages->get();
            $this->subPages     = $this->subPages->get();
        }elseif($user->type == 'shipping'){
            $this->mainPages = Page::orderBy('rank', 'asc')
                                    ->where('type','shipping')
                                   ->where('parent_id', 0)
                                   ->where('visible', 1);

            $this->subPages = Page::orderBy('rank', 'asc')
                                    ->where('type','shipping')
                                  ->where('visible', 1);
            $this->mainPages    = $this->mainPages->get();
            $this->subPages     = $this->subPages->get();

        }
        else{
            $permissions =  Auth::user()->permissions()->pluck('name');

            $this->mainPages = Page::orderBy('rank', 'asc')
                ->where('parent_id', 0)
                ->where('visible', 1);
            $this->subPages = Page::orderBy('rank', 'asc')
                ->where('visible', 1)->whereIn('title', $permissions);

            // $this->userPages = UserPage::where('user_id',$userId)->first();

            //        if($this->userPages->admin == 0){
            //            $this->pages    = $this->pages->whereNotIn('id',['2','14','6']);
            //            $this->subPages = $this->subPages->whereNotIn('id',['30']);
            //
            //        }
            $sub = $this->subPages->get('parent_id')->map(function ($q){
                return [$q->parent_id];
            });
            // dd($sub);
            $this->mainPages    = $this->mainPages->whereIn('id', $sub)->get();
            $this->subPages     = $this->subPages->get();

        }
    }

    protected function viewData()
    {
        return [
            'mainPages' => $this->mainPages,
            'subPages' => $this->subPages,
            'title' => Confiq::getValue('title','3abas Store'),
            'content' => Confiq::getValue('content',''),
            'icon' => Confiq::getValue('icon',''),
        ];
    }
    protected function getMainPages()
    {
        return $this->mainPages;
    }

    protected function setView($viewName)
    {

        return view($viewName, $this->viewData());
    }
}
