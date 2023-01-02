<?php

namespace App\Http\Controllers;

use App\Models\about;
use App\Models\files;
use Illuminate\Http\Request;
use DB;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $abouts = about::latest()->get();
       
        return view('about.index',compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $files = files::latest()->get();
        return view('about.create',compact('files'));

       // return back()->with('success','Item created successfully!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $about = new about;
        $about ->img_link=$request->img_link;
        $about ->description=$request->description;

        $about->save();
        return redirect ('about')->with('success','About Created Successfully.');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\about  $about
     * @return \Illuminate\Http\Response
     */
    public function show(about $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\about  $about
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $abouts = about::find($id);
        return view('about.edit',compact('abouts'))->with('success','About updated successfully!');
        //return back()->with('success','About updated successfully!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\about  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, about $about)
    {
        
        $request->validate([
        'img_link' => 'required',
        'description' => 'required',
        ]);
    $about->update($request->all());
    return redirect()->route('about.index')->with('success','about updated successfully');
    echo alert("about updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\about  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(about $about)
    {
        $about->delete();
        return redirect()->route('about.index')->with('success','abouts deleted successfully');
    }

      function status_update($id){
        $about =  DB::table('abouts')
                   ->select('status') 
                   ->where('id','=',$id)
                   ->first();

                   if($about->status =='1'){
                    $status = '0';
                   } else{
                    $status = '1';
                   }

                   $values = array('status'=>$status);
                   DB::table('abouts')->where('id',$id)->update($values);
                   //session()->flash('success','About status has been successfully updated.')
                   return redirect()->route('about.index')->with('success','About status has been successfully updated.');
     }
}
