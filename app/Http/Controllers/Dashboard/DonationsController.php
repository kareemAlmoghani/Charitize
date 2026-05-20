<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class DonationsController extends Controller
{
    public function donations() {
            $danations=Payment::with(['donar','cause'])->latest()->paginate(env('PAGE_SIZE'));
            return view('dashboard.donations',compact('danations'));
            
        }

    public function delete_donations(Payment $payment){
        $payment->delete();
        // $payment->donar()->delete();

        flash()->warning('Donation Deleted Succefully');
        return redirect()->back();

    }    

    public function donners() {
        $donners=User::where('type','donner')->with('donations')->latest()->paginate(env('PAGE_SIZE'));
        return view('dashboard.donners',compact('donners'));
        
    }
    public function delete_donners(User $user){
        $user->delete();
         flash()->warning('Donner Deleted Succefully');
            return redirect()->back();

    }
}
