<?php

namespace App\Http\Controllers\Admin;

use App\contentFile;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class contentFilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $contentFiles = contentFile::all();
        return View::make('admin.contentFiles.index', compact('contentFiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('admin.contentFiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($data=Input::all(),contentFile::$rules);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }

        if(Input::hasFile('link')){
            $dest = 'images/';
            $name = str_random(10).'-'.Input::file('link')->getClientOriginalName();
            Input::file('link')->move($dest,$name);
        }
        $data['link'] = $name;

        contentFile::create($data);

        return Redirect::route('admin.contentFiles.index');
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
        $contentFile=contentFile::find($id);

        return View::make('admin.contentFiles.edit',compact('contentFile'));
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
        $contentFile = contentFile::findOrFail($id);
        $data = Input::all();
        //$validator=Validator::make($data,contentFile::$rules);
        /*
        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }
*/
        $old_file_name = $contentFile->link;
        if(Input::hasFile('link')){
            $dest = 'images/';
            $name = str_random(10).'-'.Input::file('link')->getClientOriginalName();
            Input::file('link')->move($dest,$name);

            $old_file_name = $dest.'/'.$old_file_name;

            if(File::exists($old_file_name)){
                File::delete($old_file_name);
            }

            $data['link'] = $name;
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


        $contentFile->update($data);

        return Redirect::route('admin.contentFiles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        contentFile::destroy($id);

        return Redirect::route('admin.contentFiles.index');
    }

    public function showallcontents()
    {
        $contentFiles = contentFile::all();
        return View::make('admin.contentFiles.contentFilesDash',compact('contentFiles'));
    }
}
