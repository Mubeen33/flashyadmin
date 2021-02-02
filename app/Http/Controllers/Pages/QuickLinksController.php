<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Page;

class QuickLinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Appearance.pages.quicklinks.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Appearance.pages.quicklinks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $page = new Page;
        $page->title = $request->title;
        if (Page::where('slug', preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug)))->first() == null) {
            $page->slug             = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug));
            $page->content          = $request->content;
            $page->meta_title       = $request->meta_title;
            $page->meta_description = $request->meta_description;
            $page->keywords         = $request->keywords;
            if ($request->hasFile('meta_image')) {
                $page->meta_image   = $request->meta_image->store('uploads/custom-pages');;
            }
            $position = Page::max('position')->where('page_type' , 'Q');
            $page->position         = $position+1;
            $page->page_type        = "Q";
            $page->save();
            return redirect()->route('admin.quicklinks.index')->with('msg' , 'Quick Links Page has been added');
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('Appearance.pages.quicklinks.edit')->with('id' , $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $page = Page::findOrFail($id);
        $page->title = $request->title;
        if (Page::where('slug', preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug)))->first() != null) {
            $page->slug             = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug));
            $page->content          = $request->content;
            $page->meta_title       = $request->meta_title;
            $page->meta_description = $request->meta_description;
            $page->keywords         = $request->keywords;
            if ($request->hasFile('meta_image')) {
                $page->meta_image   = $request->meta_image->store('uploads/custom-pages');;
            }
            $page->page_type        = "Q";
            $page->save();
            return redirect()->route('admin.quicklinks.index')->with('msg' , 'Quick Links page has been updated');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::find($id);
        $page->delete();
        return redirect()->route('admin.quicklinks.index')->with('msg' , 'Quick Links page has been deleted');
    }

    public function update_visibility(Request $request){
        $page = Page::find($request->id);
        $page->visibility = $request->status;
        if($page->save()){
            return 1;
        }
        return 0;
    }

    public function update_positions(Request $request){
        $array = $request->array;

        for ($i=0; $i < count($array) ; $i++) { 
            $page = Page::find($array[$i]);
            $page->position = $i;
            $page->save();
        }

        return 1;
    }
}
