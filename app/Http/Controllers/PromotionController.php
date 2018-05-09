<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotion;
use View;
use Storage;
use File;
use Image;

class PromotionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('promotions.index')->with('promotions', Promotion::orderBy('created_at', 'desc')->take(20)->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('promotions.create');

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
            'type' => 'required',
            'embed_code' => 'required',            
        ]);
        $promotion = new Promotion($request->all());
        $promotion->save(); 
        return redirect()->action('PromotionController@index')->with('gda-info-message', 'New promotion is created successfully.');

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
        return view('promotions.show')->with('promotion', Promotion::find($id));

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
        return view('promotions.edit')->with('promotion', Promotion::find($id));

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
            'type' => 'required',   
            'embed_code' => 'required', 
        ]);
        $promotion = Promotion::find($id);
              
        $promotion->embed_code= $request->input('embed_code');;
        $promotion->type= $request->input('type');;
        $promotion->order= $request->input('order');;
        $promotion->is_published= $request->input('is_published');;
        $promotion->save();
        return redirect()->action('PromotionController@index')->with('gda-info-message', 'Promotion is updated successfully.');

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
