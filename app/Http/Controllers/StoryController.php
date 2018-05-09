<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Story;
use App\Models\Category;
use View;
use Storage;
use File;
use Image;
use Illuminate\Support\Facades\Auth;

class StoryController extends Controller
{
    protected $folder;
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware(['auth','gdastaff']);
        
        $this->folder = "stories";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('stories.index')->with('stories', Story::orderBy('created_at', 'desc')->take(20)->get());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('stories.create')->with('categories', Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required',
            'image_1' => 'required',            
        ]);

        if ($request->hasFile('image_1') && $request->file('image_1')->isValid()) {

                $story = new Story($request->all());

                    $image_folder = $this->folder;

                    // path does not exist       
                    if(!File::exists($image_folder)) {
                        Storage::makeDirectory($image_folder);
                    }

                    $thumbnail_folder = $image_folder . '/thumb';        
                    if(!File::exists($thumbnail_folder)) {
                        Storage::makeDirectory($thumbnail_folder);
                    }

                    $fName = 'img-' . $story->id . '01-' . rand(pow(10, 2), pow(10, 3)-1) . "." . $request->file('image_1')->extension();
        
                    $img_fileName =  $image_folder . '/' . $fName;
                    $thumb_fileName =  $thumbnail_folder . '/' . $fName;
                    if($this->uploadImage($request->file('image_1'), $fName, $image_folder, $thumb_fileName))
                    {
                        $story->image_1 = $img_fileName;
                        $story->thumbnail_1 = $thumb_fileName;
                    }

            if ($request->hasFile('image_2') && $request->file('image_2')->isValid()) {
                $fName = 'img-' . $story->id . '02-' . rand(pow(10, 2), pow(10, 3)-1) . "." . $request->file('image_2')->extension();
        
                $img_fileName =  $image_folder . '/' . $fName;
                $thumb_fileName =  $thumbnail_folder . '/' . $fName;
                if($this->uploadImage($request->file('image_2'), $fName, $image_folder, $thumb_fileName))
                {
                    $story->image_2 = $img_fileName;
                    $story->thumbnail_2 = $thumb_fileName;
                }
            }  
            if ($request->hasFile('image_3') && $request->file('image_3')->isValid()) {
                $fName = 'img-' . $story->id . '02-' . rand(pow(10, 2), pow(10, 3)-1) . "." . $request->file('image_3')->extension();
        
                $img_fileName =  $image_folder . '/' . $fName;
                $thumb_fileName =  $thumbnail_folder . '/' . $fName;
                if($this->uploadImage($request->file('image_3'), $fName, $image_folder, $thumb_fileName))
                {
                    $story->image_3 = $img_fileName;
                    $story->thumbnail_3 = $thumb_fileName;
                }
            }      
            $story->created_by = Auth::id();    
            $story->save(); 
            return redirect()->action('StoryController@index')->with('gda-info-message', 'New story is created successfully.');
           
        }
        return redirect()->action('StoryController@index')->with('gda-info-message', 'ERROR : unable to create a new story.');

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
        return view('stories.show')->with('story', Story::find($id));

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
        return view('stories.edit')->with('story', Story::find($id))->with('categories', Category::all());

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
            'content' => 'required',            
            'category_id' => 'required',            
        ]);
        $story = Story::find($id);
        $story->content = $request->input('content');
        $story->category_id = $request->input('category_id');
        $story->is_published = $request->input('is_published');
        $story->ratings = $request->input('ratings');

        if ($request->hasFile('image_1') && $request->file('image_1')->isValid()) {

            $story = new Story($request->all());

                $image_folder = $this->folder;
               
                $fName = 'img-' . $story->id . '01-' . rand(pow(10, 2), pow(10, 3)-1) . "." . $request->file('image_1')->extension();
    
                $img_fileName =  $image_folder . '/' . $fName;
                $thumb_fileName =  $thumbnail_folder . '/' . $fName;
                if($this->uploadImage($request->file('image_1'), $fName, $image_folder, $thumb_fileName))
                {
                    $story->image_1 = $img_fileName;
                    $story->thumbnail_1 = $thumb_fileName;
                }

        if ($request->hasFile('image_2') && $request->file('image_2')->isValid()) {
            $fName = 'img-' . $story->id . '02-' . rand(pow(10, 2), pow(10, 3)-1) . "." . $request->file('image_2')->extension();
    
            $img_fileName =  $image_folder . '/' . $fName;
            $thumb_fileName =  $thumbnail_folder . '/' . $fName;
            if($this->uploadImage($request->file('image_2'), $fName, $image_folder, $thumb_fileName))
            {
                $story->image_2 = $img_fileName;
                $story->thumbnail_2 = $thumb_fileName;
            }
        }  
        if ($request->hasFile('image_3') && $request->file('image_3')->isValid()) {
            $fName = 'img-' . $story->id . '02-' . rand(pow(10, 2), pow(10, 3)-1) . "." . $request->file('image_3')->extension();
    
            $img_fileName =  $image_folder . '/' . $fName;
            $thumb_fileName =  $thumbnail_folder . '/' . $fName;
            if($this->uploadImage($request->file('image_3'), $fName, $image_folder, $thumb_fileName))
            {
                $story->image_3 = $img_fileName;
                $story->thumbnail_3 = $thumb_fileName;
            }
        }     
        }   
        $story->save(); 
        return redirect()->action('StoryController@index')->with('gda-info-message', 'Story is updated successfully.');
       
    

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


    private function uploadImage($image, $fName, $image_folder, $thumb_fileName)
    {
        try {
            // resize image
            $path = Storage::putFileAs($image_folder, $image, $fName);

            $resized_Thumb = Image::make($image)->fit(150, 150, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            Storage::put($thumb_fileName , (string) $resized_Thumb->encode() );
        }
        catch (\Exception $e) {
            return false;
        }
            return true;
    }
}
