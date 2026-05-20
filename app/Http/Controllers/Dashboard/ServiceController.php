<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services=Service::latest()->paginate(env('PAGE_SIZE'));
        return view('dashboard.servicess.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $service= new Service();
        return view('dashboard.servicess.create',compact('service'));

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
        'icon'=>'required'
    ]);
    $service=Service::create([
    'title'=>[
        'en'=>$request->title_en,
        'ar'=>$request->title_ar,
    ],
    'content'=>[
    'en'=>$request->content_en,
    'ar'=>$request->content_ar,
    ],
    'icon'=>$request->icon
    ]);
    flash()->success('Service Added Successfully');
    return redirect()->route('dashboard.services.index');

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
    public function edit(Service $service)
    {
        return view('dashboard.servicess.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
         $request->validate([
        'title_en'=>'required',
        'title_ar'=>'required',
        'content_en'=>'required',
        'content_ar'=>'required',
        'icon'=>'required'
    ]);
    
    $service->update([
    'title'=>[
        'en'=>$request->title_en,
        'ar'=>$request->title_ar,
    ],
    'content'=>[
    'en'=>$request->content_en,
    'ar'=>$request->content_ar,
    ],
    'icon'=>$request->icon,
    ]);
    flash()->success('Service Updated Successfully');
    return redirect()->route('dashboard.services.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();
         flash()->warning('Service Deleted Successfully');
        return redirect()->route('dashboard.services.index');

    }
}
