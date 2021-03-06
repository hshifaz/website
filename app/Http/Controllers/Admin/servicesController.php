<?php

namespace App\Http\Controllers\Admin;

use App\contentFile;
use App\service;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class servicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $services = service::all();
        return View::make('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($data=Input::all(),service::$rules);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }

        service::create($data);

        return Redirect::route('admin.services.index');
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
        $service=service::find($id);
//dd($service);
        $contents = service::find($id)->contentFiles()->get();

//dd($contents);

        return View::make('admin.services.edit',compact('service','contents'));
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
        $service = service::findOrFail($id);

        $validator=Validator::make($data= Input::all(),service::$rules);

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


        $service->update($data);

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
        service::destroy($id);

        return Redirect::route('admin.services.index');
    }

    public function showcontents(Request $r)
    {
        $id = $r['id'];
        $allcontents = contentFile::all();
        //$service =service::where('id','=',$id)->with('contentFiles')->get();

        $contentsInService = service::find($id)->contentFiles()->get();


        $contents = array();
        foreach($allcontents as $content) {
            $exists = false;
            foreach($contentsInService as $contentInService) {
                //dd($contentInService->id);
                if ($content->id === $contentInService->id) {
                    $exists=true;
                }
            }

            if (!$exists) {
                $contents[] = $content;
            }
        }
        //dd($contents);


        $service = service::find($id);
        return View::make('admin.services._partials.selectcontent', compact('contents','service'));
    }

    public function storecontent($id,$cid)
    {
        $service=service::find($id);
        $service->contentFiles()->attach($cid);

        $contents = service::find($id)->contentFiles()->get();

        return View::make('admin.services.edit',compact('service','contents'));
    }

    public function removecontent($id,$cid)
    {
        service::find($id)->contentFiles()->detach($cid);

        $service=service::find($id);
        $contents = service::find($id)->contentFiles()->get();
        return View::make('admin.services.edit',compact('service','contents'));
    }
}
