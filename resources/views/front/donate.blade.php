@extends('front.app')
@section('title','Donate Page')
@section('content')



         <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-4">
            <h1 class="display-3 animated slideInDown">Donate</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('front.index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#!">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Donate</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


   


    <!-- Donate Start -->
    <div class="container-fluid donate py-5">
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-7 donate-text bg-light py-5 wow fadeIn" data-wow-delay="0.1s">
                    <div class="d-flex flex-column justify-content-center h-100 p-5 wow fadeIn" data-wow-delay="0.3s">
                        <h1 class="display-6 mb-4">{{ $cause->title_trans }}</h1>
                        <p class="fs-5 mb-4">{{$cause->content_trans}}</p>
                        <div>
                          <img class="w-25" src='{{asset($cause->image->path)}}'>
                          @foreach ($cause->gallery as $item )
                            <img class="w-25" src='{{asset($item->path)}}'> 
                          @endforeach
  
                      </div>
                    </div>
                </div>
                <div class="col-lg-5 donate-form bg-primary py-5 text-center wow fadeIn" data-wow-delay="0.5s">
                    <div class="h-100 p-5">
                        <form action="{{route('front.donate_process')}}" method='POST'>
                            @csrf
                            <input type="hidden" name="cause_id" value="{{$cause->id}}">
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input name="name"type="text" class="form-control" id="name" placeholder="Your Name" value="{{ Auth::user()->name ??'' }}">
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input name="email" type="email" class="form-control" id="email" placeholder="Your Email" value="{{ Auth::user()->email ??'' }}">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" value="10" name="fixed_amount" id="fixed_amount1"
                                            autocomplete="off" checked>
                                        <label class="btn btn-light" for="fixed_amount1">$10</label>

                                        <input type="radio" class="btn-check" value="20" name="fixed_amount" id="fixed_amount2"
                                            autocomplete="off">
                                        <label class="btn btn-light" for="fixed_amount2">$20</label>

                                        <input type="radio" class="btn-check" value="30" name="fixed_amount" id="fixed_amount3"
                                            autocomplete="off">
                                        <label class="btn btn-light" for="fixed_amount3">$30</label>

                                        <input type="radio" class="btn-check" value="40" name="fixed_amount" id="fixed_amount4"
                                            autocomplete="off">
                                        <label class="btn btn-light" for="fixed_amount4">$40</label>

                                        <input type="radio" class="btn-check" value="50" name="fixed_amount" id="fixed_amount5"
                                            autocomplete="off">
                                        <label class="btn btn-light" for="fixed_amount5">$50</label>
                                    </div>
                                </div>
                                <div class="col-12"> 
                                    <div class="form-floating">
                                    <input name="custom_amount"type="number" class="form-control mt-3" id="custom_amount" placeholder="Custom Amount" value="">
                                    <label for="custom_amount">Custom Amount</label>
                                </div>
                                </div>
                                <label><input type="checkbox" value="1" name="anonymous">Anonymous</label>
                                <div class="col-12"> 
                                    <h4>Payment GateWay</h4>
                                      <div class="col-12">
                                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" value="stripe" name="payment_gateway" id="payment_gateway1"
                                            autocomplete="off" checked>
                                        <label class="btn btn-light" for="payment_gateway1">Stripe</label>

                                        <input type="radio" class="btn-check" value="paypal" name="payment_gateway" id="payment_gateway2"
                                            autocomplete="off">
                                        <label class="btn btn-light" for="payment_gateway2">PayPal</label>
                                    </div>
                                </div>

                                </div>
                                <div class="col-12">
                                    <button class="btn btn-secondary py-3 w-100" type="submit">Donate Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Donate End -->
    @section('js')
        <script>
            const custom_amount=document.querySelector('#custom_amount')
            const fixed_amount=document.querySelectorAll('[name=fixed_amount]')
            custom_amount.onkeyup=()=>{
                if(custom_amount.value.length>0){
                    fixed_amount.forEach(el =>{
                        el.checked=false
                    if(el.value==custom_amount.value){
                        el.checked=true

                    }                    
                    
                });  
                        
                    }
                }   
            
            fixed_amount.forEach(el=>{
                el.onclick=()=>{
                    custom_amount.value=""
                }
            })
        </script>
    @endsection
@endsection
