<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Setting;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard');
    }

        public function messages() {
            $messages=Message::latest()->paginate(env('PAGE_SIZE'));
            return view('dashboard.messages',compact('messages'));

        }
        public function notifications(){
            $notifications=Auth::user()->notifications;
            return view('dashboard.notifications',compact('notifications'));
        }
        public function notifications_read(DatabaseNotification $notification){
            $notification->update([
                'read_at'=>now(),
            ]);
            return redirect()->back();
        }
        public function delete_messages(Message $message){
            $message->delete();
            flash()->warning('Message Deleted Succefully');
            return redirect()->back();
        }
    public function subscriptions() {
        $subscriptions=Subscription::latest()->paginate(env('PAGE_SIZE'));
        return view('dashboard.subscriptions',compact('subscriptions'));

    }
       public function delete_subscriptions(Subscription $subscription) {
     $subscription->delete();
            flash()->warning('Subscription Deleted Succefully');
            return redirect()->back();

    }

    public function settings(){
    // هذه الطريقة البديلة عن بلك ولكن بلك احسن
    // $all_settings=[];
    // $settings=Setting::all();
    // foreach($settings as $setting){
    //     $all_settings[$setting->key]=$setting->value;
    // }

    // عملنا لها مشاركة على كل صفحات الموقع لاننا بنحتاجها من خلال الاب سيرفس بروفايدر
    // $settings=Setting::pluck('value','key')->toArray();
    // compact('settings')
        return view('dashboard.settings');
    }
    public function settings_update(Request $request){
    $data=$request->except('_token','_method','site_logo','about_image');
    if($request->hasFile('site_logo')){
        $data['site_logo']=$request->file('site_logo')->store('uploads/settings','custom');
        }
    if($request->hasFile('about_image')){
        $data['about_image']=$request->file('about_image')->store('uploads/settings','custom');
        }
    foreach($data as $key=>$value){
        Setting::updateOrCreate(
            [
            'key'=>$key
        ],
        [
            'value'=>$value
        ]);
        }
        flash()->success('Settings Updated Successfully');
        return redirect()->back();
}
}
