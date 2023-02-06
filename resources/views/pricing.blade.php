@extends('layouts.front')


@section('title') {{$pricingsetting->meta_title}} @endsection
@section('meta') {{$pricingsetting->meta_description}} @endsection

@section('content')
  
  


   <div class="banner-section" data-background-image-url="{{$pricingsetting->banner_img ? $pricingsetting->banner_img : '/public/img/200x200.png'}}">

        <div class="container">
            <h1 class="banner-title">{!!$pricingsetting->banner_title!!}</h1>
            <p class="banner-desc">{!!$pricingsetting->banner_desc!!}</p>

            <div class="service-details-link">
               <a href="{{$pricingsetting->banner_btn_link}}" target="_self" class="btn btn-slider"><span>{{$pricingsetting->banner_btn_text}}</span>  <svg width="11.4" height="9.2"> <use xlink:href="#arrow"></use></svg></a>
            </div>
            
        </div>
         
       
   </div>

   	<div class="pricing-elements">

   		<div class="container">

   			<h2>{!!$pricingsetting->title!!}</h2>
   			<p>{{$pricingsetting->description}}</p>

	   		<div class="row">

	   			@foreach($pricings as $pricing)
	   			<div class="col-md-4">
	   				<div class="venor-price-box @if($pricing->pricing_switch == 1) premium-pricing @endif">
	   					@if($pricing->pricing_switch == 1) <div class="plan-ribbon-wrapper"><div class="plan-ribbon">{{$pricing->popular_text}}</div></div> @endif
					    {!!$pricing->title!!}
					    <div class="plan-features">
					        {!!$pricing->description!!}
					    </div>
					    <a href="{{$pricing->button_link}}" target="_self" class="btn btn-style1">{{$pricing->button_text}}</a>
					</div>
	   			</div>
	   			@endforeach

	   		</div>
	    </div>
   	</div>
    




@endsection

