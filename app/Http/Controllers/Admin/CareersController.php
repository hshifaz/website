<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use App\Http\Requests\CareerRequest;
use App\Career;
use App\contentFile;
use App\Http\Controllers\Controller;
class CareersController extends Controller
{
    public function index()
    {
        //
        $careers = Career::latest('post_date')->Published()->get();
        $dues = Career::latest('due_date')->UnPublished()->get();
        return view('admin.careers.index', compact('careers', 'dues'));
    }

    public function create()
    {
        //
        return view('admin.careers.create');
    }

    public function store(CareerRequest $request)
    {
        //
        Career::create($request->all());
        Session::flash('flash_message', 'Career successfully added!');
        return redirect('admin.careers');
    }

    public function show($id)
    {
        //
        $career = Career::findorFail($id);
        return view('admin.careers.show', compact('career'));
    }

    public function edit($id)
    {
        //
        $career = Career::findorFail($id);
        $contents = Career::find($id)->contentFiles()->get();
        return view('admin.careers.edit', compact('career', 'contents'));
    }

    public function update(CareerRequest $request, $id)
    {
        //
        $career = Career::findorFail($id);
        $career->update($request->all());
//        $data = $request->all();
//        dd($data);
        return redirect('admin.careers');
    }

    public function destroy($id)
    {
        $career = Career::findOrFail($id);
        $career->delete();
        //Session::flash('flash_message', 'Tender successfully deleted!');
        return redirect('admin.careers');
        // return redirect()->route('tenders');
    }

    public function showcontents(Request $r)
    {
        $id = $r['id'];
        $allcontents = contentFile::all();
        //$service =service::where('id','=',$id)->with('contentFiles')->get();
        $contentsInService = Career::find($id)->contentFiles()->get();
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

        $career = Career::find($id);
        return View::make('admin.careers._partials.selectcontent', compact('contents','career'));
    }

    public function storecontent($id,$cid)
    {
        $career=Career::find($id);
        $career->contentFiles()->attach($cid);

        $contents = Career::find($id)->contentFiles()->get();

        return View::make('admin.careers.edit',compact('career','contents'));
    }

    public function removecontent($id,$cid)
    {
        Career::find($id)->contentFiles()->detach($cid);

        $career=Career::find($id);
        $contents = Career::find($id)->contentFiles()->get();
        return View::make('admin.careers.edit',compact('career','contents'));
    }
}
