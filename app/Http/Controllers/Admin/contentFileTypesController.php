<?php

namespace App\Http\Controllers\Admin;
use App\contentFileType;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class contentFileTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $contentFileTypes = contentFileType::all();
        return View::make('admin.contentFileTypes.index', compact('contentFileTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('admin.contentFileTypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($data=Input::all(),contentFileType::$rules);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }

        contentFileType::create($data);

        return Redirect::route('admin.contentFileTypes.index');
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
        $contentFileType=contentFileType::find($id);

        return View::make('admin.contentFileTypes.edit',compact('contentFileType'));
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
        $contentFileType = contentFileType::findOrFail($id);

        $validator=Validator::make($data= Input::all(),contentFileType::$rules);

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


        $contentFileType->update($data);

        return Redirect::route('admin.contentFileTypes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        contentFileType::destroy($id);

        return Redirect::route('admin.contentFileTypes.index');
    }
}
