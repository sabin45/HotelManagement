<?php

namespace App\Http\Controllers;

use App\Models\sliders;
use Illuminate\Http\Request;

class SlidersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = sliders::latest()->get();
        return view('sliders.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sliders = new sliders;
        $sliders ->name=$request->name;
        $sliders ->img_link=$request->img_link;

        $sliders->save();
        return redirect ('sliders')->with('message','Sliders Created Successfully.'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sliders  $sliders
     * @return \Illuminate\Http\Response
     */
    public function show(sliders $sliders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sliders  $sliders
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sliders = sliders::find($id);
        return view('sliders.edit',compact('sliders'))->with('success','Sliders updated successfully!');
        
       // return view('sliders.edit',compact('sliders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sliders  $sliders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sliders $slider)
    {
        $request->validate([
            'name' => 'required',
            'img_link' => 'required'
            ]);

            $slider->update($request->all());
            return redirect()->route('sliders.index')->with('success','Sliders updated successfully');
          
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sliders  $sliders
     * @return \Illuminate\Http\Response
     */
    public function destroy(sliders $slider)
    {
        $slider->delete();
return redirect()->route('sliders.index')->with('success','sliders deleted successfully');
    }
}
