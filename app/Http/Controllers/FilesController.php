<?php

namespace App\Http\Controllers;

use App\Models\files;
use Illuminate\Http\Request;
use App\resurces\views;



class FilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = files::latest()->get();
        return view('files.index',compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('files.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $filename = str_replace(' ','',request('name'));
        $ext = $request->file_link->extension();
        $filesize = $request->file_link->getSize();
        $finalname = $filename.''.time().'.'.$request->file_link->extension();
        


        if($filename!="")
                {
                  if($filesize<2000000)
                    {
                            if($ext=='jpg' || $ext == 'png' || $ext == 'pdf' || $ext == 'jpeg')
                            {
                                if($request->file_link->move(public_path('uploads/files'),$finalname))
                                {
                                
                                    $files = new files;
                                    $files ->name=$request->name;
                                    $files ->file_link=$finalname;
                                    $files ->ext=$ext;
                            
                                    $files->save();
                                    return redirect ('files')->with('success','Files Created Successfully.');
                                }
                                else{
                                    echo alert("File couldn't uploaded successfully.") ;
                                }
                            }else 
                                {

                                    return redirect ('files')->with('error','File Extension doesn match. We only accept jpg, png, pdf.');
                            
                            } 

                    }else
                    {
                      echo alert("File size exceeded.");
                    }

                } 
                    else 
                    {
                      echo "File name is necessary.";
                    }
                    
               
                
    }
                 

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\files  $files
     * @return \Illuminate\Http\Response
     */
    public function show(files $files)
    {
        return view('files.show',compact('files'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\files  $files
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $files = files::find($id);
        return view('files.edit',compact('files'))->with('success','Files updated successfully!');
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\files  $files
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, files $file)
    {
        $request->validate([
            'name' => 'required',
            'file_link' => 'required'
            ]);

            $file->update($request->all());
            return redirect()->route('files.index')->with('success','Files updated successfully');
           
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\files  $files
     * @return \Illuminate\Http\Response
     */
    public function destroy(files $file)
    {
  
        
        // $image_path = "uploads\files";  // Value is not URL but directory file path

        $file->delete();
        unlink("uploads/files/".$file->file_link);
     
        return redirect()->route('files.index')->with('success','Files deleted successfully');
   
    }
}
