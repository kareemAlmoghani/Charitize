<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // ثبتنا قيمة الباجينيت في ملف .env
        $sliders=Slider::latest()->paginate(env('PAGE_SIZE'));
        return view('dashboard.sliders.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // انشئنا اوبجكت علشان ما يطلع ايرور علشان موضوع الترجمة
        $slider= new Slider();
        return view('dashboard.sliders.create',compact('slider'));
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
        'image'=>'required'
    ]);
    $slider=Slider::create([
    'title'=>[
        'en'=>$request->title_en, 
        'ar'=>$request->title_ar,
    ],
    'content'=>[
    'en'=>$request->content_en,
    'ar'=>$request->content_ar,
    ],
    'btn1_text'=>[
        'en'=>$request->btn1_text_en,
        'ar'=>$request->btn1_text_ar,
    ],
    'btn1_link'=>$request->btn1_link,
    'btn2_text'=>[
        'en'=>$request->btn2_text_en,
        'ar'=>$request->btn2_text_ar,
     ],
    'btn2_link'=>$request->btn2_link,
    ]);
    $path=$request->file('image')->store('uploads/sliders','custom');
    // التخزين من خلال علاقة morph
    $slider->image()->create([
        'path'=>$path
    ]);
    flash()->success('Slider Added Successfully');
    return redirect()->route('dashboard.sliders.index');


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
    public function edit(Slider $slider)
    {
    return view('dashboard.sliders.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Slider $slider)
    {
        $request->validate([
            'title_en'=>'required',
            'title_ar'=>'required',
            'content_en'=>'required',
            'content_ar'=>'required',
        ]);
        $slider->update([
            'title'=>[
                'en'=>$request->title_en,
                'ar'=>$request->title_ar,
            ],
            'content'=>[
                'en'=>$request->content_en,
                'ar'=>$request->content_ar,
            ],
            'btn1_text'=>[
                'en'=>$request->btn1_text_en,
                'ar'=>$request->btn1_text_ar,
            ],
            'btn1_link'=>$request->btn1_link,
            'btn2_text'=>[
                'en'=>$request->btn2_text_en,
                'ar'=>$request->btn2_text_ar,
            ],
            'btn2_link'=>$request->btn2_link,
        ]);
        if($request->hasFile('image')){
            // حذف الصورة المخزنة مسبقا من جهازنا
            File::delete(public_path($slider->image->path));
            $path=$request->file('image')->store('uploads/sliders','custom');
            $slider->image()->update([
                'path'=>$path
            ]);
        }
             flash()->info('Slider Updated Successfully');
            return redirect()->route('dashboard.sliders.index');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        File::delete(public_path($slider->image->path));
        $slider->image()->delete();
        $slider->delete();
        flash()->warning('Slider Deleted Successfully');
        return redirect()->route('dashboard.sliders.index');

    }
}
