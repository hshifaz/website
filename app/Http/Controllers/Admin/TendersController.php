<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Tender;
use App\Http\Requests\TenderRequest;
use Illuminate\Support\Facades\View;
use App\contentFile;
use App\Http\Controllers\Controller;

class TendersController extends Controller
{
    public function index()
    {
        $currents = Tender::latest('post_date')->Current()->get();
//        $upcoming = Tender::latest('pre_bid_date')->Upcoming()->get();
        $past = Tender::latest('post_date')->Past()->get();
        return view('admin.tenders.index', compact('currents', 'upcoming', 'past'));
    }

    public function create()
    {
        return view('tenders.create');
    }
    public function show($id)
    {
        $tender = Tender::findorFail($id);
        return view('admin.tenders.show', compact('tender'));
    }

    public function store(TenderRequest $request)
    {
        Tender::create($request->all());
        return redirect('admin.tenders');
    }
    public function edit($id)
    {
        $tender = Tender::findorFail($id);
        $contents = Tender::find($id)->contentFiles()->get();
        return view('admin.tenders.edit', compact('tender','contents'));
    }

    public function update($id, TenderRequest $request)
    {
        $tender = Tender::findorFail($id);
        $tender->update($request->all());
        return redirect('admin.tenders');
    }

    public function destroy($id)
    {
        $tender = Tender::findOrFail($id);
        $tender->delete();
        //Session::flash('flash_message', 'Tender successfully deleted!');
        return redirect('admin.tenders');
       // return redirect()->route('tenders');
    }

    public function showcontents(Request $r)
    {
        $id = $r['id'];
        $allcontents = contentFile::all();
        //$service =service::where('id','=',$id)->with('contentFiles')->get();
        $contentsInService = Tender::find($id)->contentFiles()->get();
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

        $tender = Tender::find($id);
        return View::make('admin.tenders._partials.selectcontent', compact('contents','tender'));
    }

    public function storecontent($id,$cid)
    {
        $tender = Tender::find($id);
        $tender->contentFiles()->attach($cid);

        $contents = Tender::find($id)->contentFiles()->get();

        return View::make('admin.tenders.edit',compact('tender','contents'));
    }

    public function removecontent($id,$cid)
    {
        Tender::find($id)->contentFiles()->detach($cid);

        $tender = Tender::find($id);
        $contents = Tender::find($id)->contentFiles()->get();
        return View::make('admin.tenders.edit',compact('tender','contents'));
    }
}
