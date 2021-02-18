<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Page;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Appearance.pages.business.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Appearance.pages.business.create');
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
            $page->keywords = $request->keywords;
            if ($request->hasFile('meta_image')) {
                $page->meta_image   = $request->meta_image->move('uploads/custom-pages');;
            }
            $position = Page::where('page_type' , 'B')->max('position');
            $page->position         = $position+1;
            $page->page_type        = "B";
            $page->save();
            return redirect()->route('admin.business.index')->with('msg' , 'Business page has been added');
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
        $id = decrypt($id);
        return view('Appearance.pages.business.edit')->with('id' , $id);
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
        $oldslug = Page::find($id);
        $oldslug = $oldslug->slug;
        $page = Page::findOrFail($id);
        $page->title = $request->title;

        if (Page::where('slug', preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug)))->first() == null || $oldslug == preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug))) {
            $page->slug             = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug));
            $page->content          = $request->content;
            $page->meta_title       = $request->meta_title;
            $page->meta_description = $request->meta_description;
            $page->keywords         = $request->keywords;
            if ($request->hasFile('meta_image')) {
                $page->meta_image   = $request->meta_image->move('uploads/custom-pages');;
            }
            $page->page_type        = "B";
            $page->save();
            return redirect()->route('admin.business.index')->with('msg' , 'Business page has been updated');
        }
        return redirect()->route('admin.business.index')->with('errormsg' , 'Slug Already Exist');
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
        return redirect()->route('admin.business.index')->with('msg' , 'Business page has been deleted');
    }
}
