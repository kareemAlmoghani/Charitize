<?php

namespace App\Http\Controllers;

use App\Models\Cause;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;

class PaymentController extends Controller
{
    public function donate(Cause $cause){
        return view ('front.donate',compact('cause'));

    }
    public function donate_process(Request $request) {
        $amount=$request->custom_amount? $request->custom_amount:$request->fixed_amount;
        $payment=Payment::create([
            'cause_id'=>$request->cause_id,
            'user_id'=>$request->anonymous? null: Auth::id(),
            'amount'=>$amount,
            'payment_gateway'=>$request->payment_gateway,
        ]);
        return match ($request->payment_gateway){
            'stripe'=>$this->payWithStripe($payment),
            // 'paypal'=>$this->payWithPaypal($payment),
        };
    }


    // from chatgbt
    public function donate_success(Request $request){

    $sessionId = $request->get('session_id');

    if (!$sessionId) {
        abort(404, 'Session ID missing');
    }
     Stripe::setApiKey(apiKey: config('services.stripe.secret'));

    $session = StripeSession::retrieve($sessionId);
    if ($session->payment_status !== 'paid') {
        return abort(403, 'Payment not completed');
    }
    $paymentId=$session->metadata->donation_id??null;
     if (!$paymentId) {
        abort(404, 'Payment Not Found');
    }

    $payment=Payment::findOrFail($paymentId);
    if($payment->status !== 'completed'){
        $payment->update([
            'status'=>'completed',
            'transaction_number'=>$session->payment_intent
        ]);
    }
    flash()->success('Donation Done');
            return redirect()->back();


    }

    public function donate_cancel(){

        return redirect()->back();
    }

    // from chat gbt
private function payWithStripe($payment)
{
    Stripe::setApiKey(config('services.stripe.secret'));

    $session = StripeSession::create([
        'payment_method_types' => ['card'],
        'line_items' => [[
            'price_data' => [
                'currency' => 'usd',
                'product_data' => [
                    'name' => 'Donation for Cause #' . $payment->cause_id,
                ],
                'unit_amount' => $payment->amount * 100,
            ],
            'quantity' => 1,
        ]],
        'mode' => 'payment',

        'metadata' => [
            'donation_id' => $payment->id,
        ],

        'success_url' => route('front.donate_success') . '?session_id={CHECKOUT_SESSION_ID}',
        'cancel_url' => route('front.donate_cancel'),
    ]);

    return redirect($session->url);
}

    // private function payWithPaypal(Payment $payment){
    //     $client=app('paypal.client');
    //     /////////


    // }




}
