<?php

namespace App\Http\Controllers\Admin;

use App\menu;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class menusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$menus = menu::all() -> where('parent_id', '=', 0);
        $menus = menu::where('parent_id', '=', 0)->orderBy('order')->get();
        return View::make('admin.menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('admin.menus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($data=Input::all(),menu::$rules);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }

        menu::create($data);

        return Redirect::route('admin.menus.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $menu=menu::find($id);

        return View::make('admin.menus.edit',compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $menu = menu::findOrFail($id);
        $data= Input::all();

        $validator=Validator::make($data,menu::$rules);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }
        $old_file_name = $menu->file;
        if(Input::hasFile('file')){
            $dest = 'images/';
            $name = str_random(10).'-'.Input::file('file')->getClientOriginalName();
            Input::file('file')->move($dest,$name);

            $old_file_name = $dest.'/'.$old_file_name;

            if(File::exists($old_file_name)){
                File::delete($old_file_name);


            }

            $data['file'] = $name;
        }

        /**
         * Check if Request param contains
         * status, if so activate
         * if not deactivate status
         */
        $status_exists = false;
        foreach($data as $key=>$value){
            if($key == 'status'){
                $status_exists = true;
            }
        }

        if($status_exists){
            $data['status']=1;
        }else{
            $data['status']=0;
        }

        /**
         * Status Check Finished
         */


        $menu->update($data);

        return Redirect::route('admin.menus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        menu::destroy($id);

        return Redirect::route('admin.menus.index');
    }
}
