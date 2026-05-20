<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Support\Facades\File;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams=Team::latest()->paginate(env('PAGE_SIZE'));
        return view('dashboard.teams.index',compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $team=new Team();
        return view('dashboard.teams.create',compact('team'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_en'=>'required',
            'title_ar'=>'required',
            'position_en'=>'required',
            'position_ar'=>'required',
            'image'=>'required'
        ]);
         $team=Team::create([
        'title'=>[
        'en'=>$request->title_en,
        'ar'=>$request->title_ar,
    ],
         'position'=>[
        'en'=>$request->position_en,
        'ar'=>$request->position_ar,
    ],        
       'facebook'=>$request->facebook,
        'instagram'=>$request->instagram,
        'x'=>$request->x,
        'linkedin'=>$request->linkedin,
        'youtube'=>$request->youtube,

    ]);
    $path=$request->file('image')->store('uploads/teams','custom');
    $team->image()->create([
        'path'=>$path
    ]);
     flash()->success('Team Added Successfully');
    return redirect()->route('dashboard.teams.index');
    }

    /**
     * Display the specified resource.
     */
    // public function show(Team $team)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
      return view('dashboard.teams.edit',compact('team'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
          $request->validate([
            'title_en'=>'required',
            'title_ar'=>'required',
           'position_en'=>'required',
            'position_ar'=>'required',
        ]);
         $team->update([
        'title'=>[
        'en'=>$request->title_en,
        'ar'=>$request->title_ar,
    ],
         'position'=>[
        'en'=>$request->position_en,
        'ar'=>$request->position_ar,
    ],
          'facebook'=>$request->facebook,
        'instagram'=>$request->instagram,
        'x'=>$request->x,
        'linkedin'=>$request->linkedin,
        'youtube'=>$request->youtube,
    ]);

    if($request->hasFile('image')){
        File::delete(public_path($team->image->path));
        $path=$request->file('image')->store('uploads/teams','custom');
        $team->image()->update([
            'path'=>$path
            ]);
    }
     flash()->success('Team Updated Successfully');
    return redirect()->route('dashboard.teams.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        File::delete(public_path($team->image->path));
        $team->image()->delete();
        $team->delete();
        flash()->warning('Team Deleted Successfully');
    return redirect()->route('dashboard.teams.index');
    }
}
