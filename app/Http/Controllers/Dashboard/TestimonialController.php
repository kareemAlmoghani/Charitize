<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials=Testimonial::latest()->paginate(env('PAGE_SIZE'));
        return view('dashboard.testimonials.index',compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $testimonial= new Testimonial();
        return view('dashboard.testimonials.create',compact('testimonial'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_en'=>'required',
            'title_ar'=>'required',
            'review'=>'required',
            'image'=>'required'
        ]);
         $testimonial=Testimonial::create([
        'title'=>[
        'en'=>$request->title_en,
        'ar'=>$request->title_ar,
    ],
       'position'=>[
        'en'=>$request->position_en,
        'ar'=>$request->position_ar,
    ],
        'review'=>$request->review,
        'rate'=>$request->rate
    ]);
    $path=$request->file('image')->store('uploads/testimonials','custom');
    $testimonial->image()->create([
        'path'=>$path
    ]);
     flash()->success('Testimonial Added Successfully');
    return redirect()->route('dashboard.testimonials.index');
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
    public function edit(Testimonial $testimonial)
    {
        return view('dashboard.testimonials.edit',compact('testimonial'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
          $request->validate([
            'title_en'=>'required',
            'title_ar'=>'required',
            'review'=>'required',
        ]);
         $testimonial->update([
        'title'=>[
        'en'=>$request->title_en,
        'ar'=>$request->title_ar,
    ],
       'position'=>[
        'en'=>$request->position_en,
        'ar'=>$request->position_ar,
    ],
        'review'=>$request->review,
        'rate'=>$request->rate
    ]);
    if($request->hasFile('image')){
        File::delete(paths: public_path($testimonial->image->path));
        $path=$request->file('image')->store('uploads/testimonials','custom');
        $testimonial->image()->update([
            'path'=>$path
        ]);
    }
     flash()->info('Testimonial Updated Successfully');
    return redirect()->route('dashboard.testimonials.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
     File::delete(paths: public_path($testimonial->image->path));
     $testimonial->image()->delete();
     $testimonial->delete();
      flash()->warning('Testimonial Deleted Successfully');
    return redirect()->route('dashboard.testimonials.index');
    }
}
