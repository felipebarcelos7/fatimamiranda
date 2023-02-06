@extends('layouts.front')

@section('title') {{$aboutsetting->meta_title}} @endsection
@section('meta') {{$aboutsetting->meta_description}} @endsection

@section('styles')
<link href="{{ asset('css/front/magnific.min.css')}}" type="text/css" rel="stylesheet">
@endsection

@section('content')
  
  <div class="banner-section" data-background-image-url="{{$aboutsetting->banner_img ? $aboutsetting->banner_img : '/public/img/200x200.png'}}">

        <div class="container">
            <h1 class="banner-title">{!!$aboutsetting->banner_title!!}</h1>
            <p class="banner-desc">{!!$aboutsetting->banner_desc!!}</p>

            @if($aboutsetting->banner_btn_text)
                <div class="service-details-link">
                    <a href="{{$aboutsetting->banner_btn_link}}" target="_self" class="btn btn-slider"><span>{{$aboutsetting->banner_btn_text}}</span>  <svg width="11.4" height="9.2"> <use xlink:href="#arrow"></use></svg></a>
                </div>
            @endif
        </div>
        
       
   </div>
  


   <div class="about-us">
       <div class="container">
           <div class="row align-items-center">
               <div class="col-md-5">
       
                   <div class="simpleParallax-video">
                        <div class="simpleParallax">
                            <img width="500" height="665" src="/public/img/loading-blog.gif" class="lazy thumparallax img-fluid" data-src="{{$aboutsetting->about_image}}" alt="about-image">
                        </div>
                        <a class="popup-vimeo-video" href="{{$aboutsetting->about_ytlink}}">
                            <i class="far fa-play-circle"></i>
                        </a>
                    </div>
               </div>
               <div class="col-md-7">


                    <h4 class="about-heading1-home">{{$aboutsetting->about_subtitle}}</h4>
                    <h3 class="about-heading2-home">{!!$aboutsetting->about_title!!}</h3>

                    {!!$aboutsetting->about_description!!}

                    <a href="{{$aboutsetting->about_buttonlink}}" target="_self" class="btn btn-style1"><span>{{$aboutsetting->about_buttontext}}</span></a>
       
                   
               </div>
           </div>
       </div>
   </div>
   <div class="clients-section">
        <div class="container">
            
            <div class="clients-slider owl-carousel">
                  @foreach($clients as $client)
                  <div class="clients-slide">
                      <a title="{{$client->company_name}}" target="_blank" href="{{$client->company_link}}"><img class="client_image owl-lazy" data-src="{{$client->photo ? '/public/images/media/' . $client->photo->file : '/public/img/200x200.png'}}" alt="{{$client->company_name}}"></a>
                  </div>
                  @endforeach
            </div>
            
        </div>
    </div>
   
   <div class="members-section">
        <div class="container">
            <h3 class="members-heading1">{!!$aboutsetting->member_title_section!!}</h3>
        

            <div class="row">
                @foreach($members as $member)
                  <div class="col-md-4">
                      <div class="venor-team">
                          <div class="thumbnail"> 
                              <img width="350" height="350" class="lazy img-fluid" src="/public/img/loading-blog.gif" data-src="{{$member->photo ? '/public/images/media/' . $member->photo->file : '/public/img/200x200.png'}}" alt="team-venor">
                          </div>
                          <div class="content">
                              <h5 class="title">{{$member->name}}</h5>
                              <p class="position">{{$member->position}}</p>
                          </div>
                          <ul class="social-icon">
                              <li><a target="_blank" rel="noopener" href="{{$member->facebook}}"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                              <li><a target="_blank" rel="noopener" href="{{$member->linkedin}}"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                              <li><a target="_blank" rel="noopener" href="{{$member->twitter}}"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                          </ul>
                      </div>
                  </div>
                @endforeach
            </div>

        </div>
    </div>

    <div class="testimonial-section">

        <div class="testimonial-section-slider owl-carousel">

            @foreach($testimonials as $testimonial)
            <blockquote class="testimonial-slide">
                <div class="section_title">{{$testimonial->subtitle}}</div>
                <span class="testimonial_slider_title">{{$testimonial->title}}</span>
                    <div class="testimonial-area">
                        <div class="testimonial-layoutArea">
                           <p>{{$testimonial->description}}</p>
                        </div>
                    </div>
                <div class="testimonials_slider_name"> {{$testimonial->name}}<span> - {{$testimonial->position}}</span></div>
            </blockquote>
            @endforeach

        </div>

        <div class="icon-testimonial"><svg class="testimonials__icon" xmlns="http://www.w3.org/2000/svg" width="22" height="29.9" viewBox="0 0 22 29.9"><path d="M.2 20.2c.1.3 2.4 6.8 5.1 9.5.2.2.3.2.6.2.2 0 .4-.1.6-.2.3-.3.3-.8 0-1.1C4 26.2 1.8 20 1.7 19.7c-.2-.6-.2-1.3.1-1.4.2-.1.3-.2.5-.1.2 0 .4.2.5.4l2.4 4.1c.2.3.5.5.9.4.3-.1.6-.4.6-.8v-13c0-.5.4-.8.8-.8.5 0 .8.4.8.8v9.1c0 .5.3.8.8.8s.8-.3.8-.8v-3.9c0-.5.4-.8.8-.8s.8.4.8.8v4.2c0 .5.3.8.8.8s.8-.3.8-.8v-3.1c0-.5.4-.8.8-.8s.8.4.8.8v3.2c0 .5.3.8.8.8s.8-.3.8-.8v-1.6c0-.5.4-.8.8-.8.5 0 .8.6.9.9 0 .8.4 8-.9 11.3-.2.4 0 .9.5 1 .1 0 .2.1.3.1.3 0 .6-.2.7-.5 1.6-3.8 1.1-11.8 1.1-12.1V17c-.3-1.4-1.3-2.3-2.4-2.3-.3 0-.7.1-1 .2-.3-1-1.3-1.7-2.3-1.7-.4 0-.8.1-1.1.3-.4-.8-1.2-1.3-2.2-1.3-.3 0-.6 0-.8.2v-3c.1-1.4-1-2.5-2.3-2.5S5.1 8 5.1 9.3v10.2L4.3 18c-.3-.6-.8-1-1.5-1.2-.6-.2-1.3 0-1.8.3-1 .5-1.2 1.7-.8 3.1zM6.3 2.5c-.2-.4-.1-.9.3-1.1l2-1.3c.4-.2.9-.1 1.1.3.3.4.1.9-.2 1.1l-.5.2c4.6 1 8.8 2.7 12.7 5.2.4.2.5.7.2 1.1-.2.2-.4.3-.7.3-.2 0-.3 0-.4-.1-3.6-2.4-7.7-4.1-12.1-5l.3.6c.2.4.1.9-.3 1.1-.1.1-.3.1-.4.1-.3 0-.5-.1-.7-.4L6.3 2.5z"></path></svg></div>

    </div>


    



@endsection

