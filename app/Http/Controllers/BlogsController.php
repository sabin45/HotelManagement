<?php

namespace App\Http\Controllers;

use App\Models\blogs;
use Illuminate\Http\Request;
use DB;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = blogs::latest()->get();
        return view('blogs.index',compact('blogs'));
       // return view (blogs.index, $blogs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blogs = new blogs;
        $blogs ->img_link=$request->img_link;
        $blogs ->title=$request->title;
        $blogs ->sub_title=$request->sub_title;
        $blogs ->description=$request->description;
        $blogs ->btn_link=$request->btn_link;

        $blogs->save();
        return redirect ('blogs')->with('success','Blogs Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function show(blogs $blogs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $blogs = blogs::find($id);
        return view('blogs.edit',compact('blogs'))->with('success','Blogs updated successfully!');
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, blogs $blog)
    {
        $request->validate([
            'img_link' => 'required',
            'title' => 'required',
            'sub_title' => 'required',
            'description' => 'required',
            'btn_link' => 'required',
            ]);

            $blog->update($request->all());
            return redirect()->route('blogs.index')->with('success','blogs updated successfully');
           // echo alert("blogs updated successfully");      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function destroy(blogs $blog)
    {
        $blog->delete();
        return redirect()->route('blogs.index')->with('success','blogs deleted successfully');
    }

     function status_update($id){
        $blog = DB::table('blogs')
                ->select('status')
                ->where ('id','=',$id)
                ->first();

                if($blog->status =='1'){
                    $status='0';
                } else{
                    $status = '1';
                }

                $result = array('status'=>$status);
                DB::table('blogs')-> where('id',$id)->update($result);
                return redirect()->route('blogs.index')->with('success','Status updated successfully');

    }
}
