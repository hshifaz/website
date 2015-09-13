<?php

namespace App\Http\Controllers\Admin;

use App\serviceCategory;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class serviceCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $serviceCategories = serviceCategory::all();
        return View::make('admin.serviceCategories.index', compact('serviceCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('admin.serviceCategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($data=Input::all(),serviceCategory::$rules);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }

        serviceCategory::create($data);

        return Redirect::route('admin.serviceCategories.index');
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
        $serviceCategory=serviceCategory::find($id);

        return View::make('admin.serviceCategories.edit',compact('serviceCategory'));
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
        $serviceCategory = serviceCategory::findOrFail($id);

        $validator=Validator::make($data= Input::all(),serviceCategory::$rules);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
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


        $serviceCategory->update($data);

        return Redirect::route('admin.services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        serviceCategory::destroy($id);

        return Redirect::route('admin.services.index');
    }
}
