<?php

namespace App\Http\Controllers;

use App\Models\rooms;
use Illuminate\Http\Request;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = rooms::latest()->get();
        return view('rooms.index',compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rooms.create');
        return back()->with('success','Rooms created successfully!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rooms = new rooms;
        $rooms ->img_link=$request->img_link;
        $rooms ->title=$request->title;
        $rooms ->description=$request->description;

        $rooms->save();
        return redirect ('rooms')->with('message','Rooms Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rooms  $rooms
     * @return \Illuminate\Http\Response
     */
    public function show(rooms $rooms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rooms  $rooms
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rooms = rooms::find($id);
        return view('rooms.edit',compact('rooms'))->with('success','About updated successfully!');
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\rooms  $rooms
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, rooms $room)
    {
        // $request->validate([
        //     'img_link' => 'required',
        //     'title' => 'required',
        //     'description' => 'required'
        // ]);
    
        // $rooms->img_link = $request->img_link;
        // $rooms->title = $request->title;
        // $rooms->description = $request->description;
            
        // if ($rooms->save()) {
        //     return redirect()->route('rooms.index')->with('success', 'Rooms Updated');
        // } else {
        //     // handle error.
        // }

        $request->validate([
        'img_link' => 'required',
        'title' => 'required',
        'description' => 'required'
    ]);
        
        $room->update($request->all());
        return redirect()->route('rooms.index')->with('success','Rooms updated successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rooms  $rooms
     * @return \Illuminate\Http\Response
     */
    public function destroy(rooms $room)
    {
        $room->delete();
return redirect()->route('rooms.index')->with('success','rooms deleted successfully');
    }
}
