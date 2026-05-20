<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Cause;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CauseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $causes=Cause::with('category')->latest()->paginate(env('PAGE_SIZE'));
        return view('dashboard.causes.index',compact('causes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    $cause= new Cause();
    $categories=Category::select('title','id')->get();
     return view('dashboard.causes.create',compact('cause','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
       'title_en'=>'required',
       'title_ar'=>'required',
       'content_en'=>'required',
       'content_ar'=>'required',
       'image'=>'required',
       'category_id'=>'required|exists:categories,id'
        ]);

        $cause=Cause::create([
        'title'=>[
            'en'=>$request->title_en,
            'ar'=>$request->title_ar,
        ],
         'content'=>[
            'en'=>$request->content_en,
            'ar'=>$request->content_ar,
        ],
        'goal'=>$request->goal,
        'status'=>$request->status,
        'category_id'=>$request->category_id,
        ]);

        $path=$request->file('image')->store('uploads/causes','custom');
        $cause->image()->create([
            'path'=>$path
        ]);
        if($request->has('gallery')){
            foreach($request->gallery as $item){
                $path=$item->store('uploads/causes/gallery','custom');
                $cause->gallery()->create([
                'path'=>$path,
                'type'=>'gallery'
        ]);
            }

        }

           flash()->success('causes Added Successfully');
         return redirect()->route('dashboard.causes.index');
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cause $cause)
    {
            $categories=Category::select('title','id')->get();
        return view('dashboard.causes.edit',compact('cause','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cause $cause)
    {
        $request->validate([
       'title_en'=>'required',
       'title_ar'=>'required',
       'content_en'=>'required',
       'content_ar'=>'required',
       'category_id'=>'required|exists:categories,id'
        ]);

        $cause->update([
        'title'=>[
            'en'=>$request->title_en,
            'ar'=>$request->title_ar,
        ],
         'content'=>[
            'en'=>$request->content_en,
            'ar'=>$request->content_ar,
        ],
        'goal'=>$request->goal,
        'status'=>$request->status,
        'category_id'=>$request->category_id,
        ]);

       if($request->hasFile('image')){
        File::delete(public_path($cause->image->path));
        $path=$request->file('image')->store('uploads/causes','custom');
        $cause->image()->update([
            'path'=>$path
        ]);
       }
        if($request->has('gallery')){
            foreach($request->gallery as $item){
                // File::delete(public_path($item->path));
                $path=$item->store('uploads/causes/gallery','custom');
                $cause->gallery()->create([
                'path'=>$path,
                'type'=>'gallery'
        ]);
            }

        }

           flash()->info('causes Updated Successfully');
           return redirect()->route('dashboard.causes.index') ;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cause $cause)
    {
        File::delete(public_path($cause->image->path));
        $cause->image()->delete();
        $cause->delete();

           flash()->warning('causes Deleted Successfully');
           return redirect()->route('dashboard.causes.index') ;

    }

    public function delete_gallery(Cause $cause,Image $image){
        File::delete(public_path($image->path));
        $image->delete();
        flash()->warning('Image Deleted Successfully');
           return redirect()->back() ;
    }
}
