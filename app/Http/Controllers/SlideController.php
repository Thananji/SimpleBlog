<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use View;
use Storage;
use File;
use Image;
class SlideController extends Controller
{

    protected $folder;
    public function __construct()
    {
        $this->middleware('auth');        
        $this->folder = "slides";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('slides.index')->with('slides', Slide::orderBy('created_at', 'desc')->take(20)->get());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $slide = new Slide;
        return view('slides.edit')->with('slide', $slide);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',            
            'image' => 'required',            
        ]);
        $slide = new Slide($request->all());
        $image_folder = $this->folder;

        // path does not exist       
        if(!File::exists($image_folder)) {
            Storage::makeDirectory($image_folder);
        }
        
        $fName = 'img-' . $slide->id  . rand(pow(10, 2), pow(10, 3)-1) . "." . $request->file('image')->extension();
        $slide->image = Storage::putFileAs($image_folder, $request->file('image'), $fName);

        $slide->save();
        return redirect()->action('SlideController@index')->with('gda-info-message', 'New slide is created successfully.');

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
        return view('slides.show')->with('slide', Slide::find($id));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('slides.edit')->with('slide', Slide::find($id));

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
        //
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',            
        ]);
        $slide = Slide::find($id);
        $image_folder = $this->folder;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $fName = 'img-' . $slide->id  . rand(pow(10, 2), pow(10, 3)-1) . "." . $request->file('image')->extension();
            $slide->image = Storage::putFileAs($image_folder, $request->file('image'), $fName);    
        }       
        $slide->title= $request->input('title');;
        $slide->content= $request->input('content');;
        $slide->button_anchor= $request->input('button_anchor');;
        $slide->is_published= $request->input('is_published');;
        $slide->save();
        return redirect()->action('SlideController@index')->with('gda-info-message', 'Slide is updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
