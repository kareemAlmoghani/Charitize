<?php

namespace App\Http\Controllers;

use App\Models\Cause;
use App\Models\Event;
use App\Models\Message;
use App\Models\Slider;
use App\Models\Service;
use App\Models\Statistic;
use App\Models\Subscription;
use App\Models\Team;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class MainController extends Controller
{
        public function index(){
            $sliders=Slider::with('image')->latest()->take(3)->get();
            $causes=Cause::with(['image','category','donations'])->latest()->take(3)->where('status','open')->get();
            $events=Event::with('image')->latest()->take(3)->get();
            $services=Service::latest()->take(6)->get();
            $statistics=Statistic::latest()->take(4)->get();
            $teams=Team::with('image')->latest()->take(value: 3)->get();
            $testimonials=Testimonial::with('image')->latest()->take(3)->get();
            return view('front.index',compact('sliders','causes','events','services','statistics','teams','testimonials'));
        }
    public function about(){
        $statistics=Statistic::latest()->take(4)->get();
        $teams=Team::with('image')->latest()->take(3)->get();
        return view('front.about',compact('statistics','teams'));
    }
    public function service(){
          $services=Service::latest()->take(6)->get();
        $testimonials=Testimonial::with('image')->latest()->take(3)->get();
        return view('front.service',compact('services','testimonials'));
    }
    public function donation(){
         $causes=Cause::with(['image','category','donations'])->latest()->take(3)->where('status','open')->get();
        return view('front.donation',compact('causes'));
    }
    public function event(){
        $events=Event::with('image')->latest()->take(3)->get();
        return view('front.event',compact('events'));
    }
    public function feature(){
        $statistics=Statistic::latest()->take(4)->get();
        return view('front.feature',compact('statistics'));
    }
    public function team(){
        $teams=Team::with('image')->latest()->take(value: 3)->get();
        return view('front.team',compact('teams'));
    }
    public function testimonial(){
        $testimonials=Testimonial::with('image')->latest()->take(3)->get();
        return view('front.testimonial',compact('testimonials'));
    }
    public function contact(){
        return view('front.contact');
    }
     public function contact_data(Request $request){
        $request->validate([
             'name'=>'required',
            'email'=>'required',
            'subject'=>'required',
            'message'=>'required',

        ]);
        $messages=Message::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'message'=>$request->message,

        ]);
        flash()->success('Message Send Succefully');
            return redirect()->back();


    }
    public function subscribe(Request $request){
        $request->validate([
            'email'=>'required|unique:subscriptions,email,except,id'
        ]);
        Subscription::create([
            'email'=>$request->email,
        ]);
        flash()->success('Your Subscripe Succefully');
            return redirect()->back();

    }

}
