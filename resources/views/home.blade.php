@extends('layouts.front')

@section('title') {{$homesetting->meta_title}} @endsection
@section('meta') {{$homesetting->meta_description}} @endsection
@section('styles')
<link href="{{ asset('css/front/magnific.min.css')}}" type="text/css" rel="stylesheet">
@endsection

@section('content')



    <div class="slider-vex-section">
        <div class="slider-vex owl-carousel">
            
            @foreach( $sliders as $slido )
            
            <div class="service-item">
                @if($slido->typed_text)
                <div class="service-item-inner">
                         <div class="service-item-bg-title">
                    <span class="servicebg-title">{!!$slido->typed_text!!}</span>
                </div>
                @endif
                    <div class="details-holder">
                        <div class="col-md-12 parallax-holder" >
                            <div class="service-item-image"  data-tilt="" data-tilt-gyroscope="false" data-tilt-scale="1.01" data-tilt-speed="5000" data-tilt-perspective="600" data-hover="" data-tilt-glare="false" data-tilt-max-glare="0" data-tilt-max="2"  data-tilt-reverse="true"  style="background-image: url({{$slido->photo ? '/public/images/media/' . $slido->photo->file : '/public/img/200x200.png'}});"></div>

                        </div>
                        <div class="service-details col-md-7">
                             @if($slido->video_link)
                            <div class="service-details-video">
                                <div class="btn-play">
                                    <a class="popup-vimeo-video" href="{!!$slido->video_link!!}">
                                        <svg enable-background="new 0 0 60 60" version="1.1" viewBox="0 0 60 60" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="M45.563,29.174l-22-15c-0.307-0.208-0.703-0.231-1.031-0.058C22.205,14.289,22,14.629,22,15v30   c0,0.371,0.205,0.711,0.533,0.884C22.679,45.962,22.84,46,23,46c0.197,0,0.394-0.059,0.563-0.174l22-15   C45.836,30.64,46,30.331,46,30S45.836,29.36,45.563,29.174z M24,43.107V16.893L43.225,30L24,43.107z"/><path d="M30,0C13.458,0,0,13.458,0,30s13.458,30,30,30s30-13.458,30-30S46.542,0,30,0z M30,58C14.561,58,2,45.439,2,30   S14.561,2,30,2s28,12.561,28,28S45.439,58,30,58z"/></svg>
                                    </a>
                                </div>
                            </div>
                            @endif
                            <div class="service-details-subtitle"> <p>{!!$slido->heading2!!}</p> </div>
                            <div class="service-details-title">  <h2>{!!$slido->heading1!!}</h2>
                            </div>
                            <div class="service-details-description">
                               {!!$slido->bodyslider!!}
                            </div>
                            <div class="service-details-link">
                                 <a href="{!!$slido->button_link!!}" target="_self" class="btn btn-slider"><span>{!!$slido->button_text!!}</span>  <svg width="11.4" height="9.2"> <use xlink:href="#arrow"></use></svg></a>
                                 @if($slido->button_text2)
                                 <a href="{!!$slido->button_link2!!}" target="_self" class="btn btn-slider"><span>{!!$slido->button_text2!!}</span>  <svg width="11.4" height="9.2"> <use xlink:href="#arrow"></use></svg></a>
                                 @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            

            @endforeach
        
        </div>

        <div class="header-social-share">
            <svg width="18" height="20.2"><use xlink:href="#share"></use></svg> {!!$headerfooter->social_links!!}
        </div>

        <a href="#about-us" class="hero__scroll"><svg width="15" height="22.1"><use xlink:href="#scroll"></use></svg></a>
    </div>

    

    <div class="about-section" id="about-us">
        <div class="container">
            <div class="row">


                <div class="col-md-5">

                    <h4 class="about-heading1-home">{!!$homesetting->about_subtitle!!}</h4>
                    <h3 class="about-heading2-home">{!!$homesetting->about_title!!}</h3>

                    {!!$homesetting->about_description!!}

                    <a href="{{$homesetting->about_buttonlink}}" target="_self" class="btn btn-style1"><span>{{$homesetting->about_buttontext}}</span></a>

                </div>
               
                <div class="col-md-7">
                    
                    <div class="item-about">
                        <div class="imgtwo big-paral">
                            <img  width="500" height="820" class="thumparallax img-fluid" src="{{$homesetting->about_image1}}" alt="about us">
                        </div>
                    </div>

                </div>


                


            </div>
        </div>
    </div>

    <div class="fun-facts-section" id="fun-facts">
        <div class="container">

            <h3 class="fun-facts-heading1">{{$homesetting->fun_title}}</h3>

            <p>{{$homesetting->fun_description}}</p>

            <div class="row fun-facts-timer">
                <div class="col-md-3">
                    <div class="radial">
                        <img src="{{$homesetting->fun_photo1}}" alt="fun-icon" / width="50" height="50">
                        <span class="timer" data-from="0" data-to="{{$homesetting->count_number1}}" data-speed="4000">{{$homesetting->count_number1}}</span>
                        <h4>{{$homesetting->count_description1}}</h4>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="radial">
                        <img src="{{$homesetting->fun_photo2}}" alt="fun-icon" / width="50" height="50">
                        <span class="timer" data-from="0" data-to="{{$homesetting->count_number2}}" data-speed="4000">{{$homesetting->count_number2}}</span>
                        <h4>{{$homesetting->count_description2}}</h4>
                    </div>
                    
                </div>
                <div class="col-md-3">
                    <div class="radial">
                        <img src="{{$homesetting->fun_photo3}}" alt="fun-icon" / width="50" height="50">
                        <span class="timer" data-from="0" data-to="{{$homesetting->count_number3}}" data-speed="4000">{{$homesetting->count_number3}}</span>
                        <h4>{{$homesetting->count_description3}}</h4>
                    </div>
                    
                </div>
                <div class="col-md-3">
                    <div class="radial">
                        <img src="{{$homesetting->fun_photo4}}" alt="fun-icon" / width="50" height="50">
                        <span class="timer" data-from="0" data-to="{{$homesetting->count_number4}}" data-speed="4000">{{$homesetting->count_number4}}</span>
                        <h4>{{$homesetting->count_description4}}</h4>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <div class="services-section">
        <div class="container">
            
            <div class="row">
                <div class="col-md-6">
                    <h4>{!!$homesetting->service_subtitlu!!}</h4>
                    <h3>{!!$homesetting->services_title!!}</h3>
                </div>
                <div class="col-md-6">
                    <div class="description-services">{!!$homesetting->sevices_text!!}</div>
                </div>
            </div>
            

            <div class="service-boxes-slider owl-carousel">
                
                @foreach( $services as $service )

                <div class="card-parent">

                    <div class="image-wrapper to-bottom">
                        <div class="gallery">
                            <img width="400" height="400" class="lazy img-fluid thumparallax-down" src="/public/img/loading-blog.gif" data-src="{{$service->photo ? '/public/images/media/' . $service->photo->file : '/public/img/200x200.png'}}" alt="{{$service->title}}">
                        </div>
                    </div>
                    
                    <div class="card featured to-top-left">
        
                        <div class="heading-wrapper">
                            <h3 class="heading">{{$service->icon}}</h3>
                            <h4 class="heading"> {{$service->title}}</h4>
                        </div> 
        
                        <div class="paragraph-wrapper">
                            <p class="paragraph">{{$service->description}}</p>
                            <div class="service-link-div"><a class="service-link" href="{{$service->link}}">{{$service->button_text}} <svg width="11.4" height="9.2"> <use xlink:href="#arrow"></use></svg></a></div>
                        </div>

                    </div>
                </div>
                @endforeach

            </div> 
     
        </div>
    </div>

    <div class="paralax-section">
        @if($homesetting->paralax_image)
            <div class="paralax-section-inner">
                <div class="paralax-image"> <img class="img-fluid thumparallax" src="{{$homesetting->paralax_image}}"> </div>
                <div class="paralax-content">
                    <div class="container">
                        <div class="paralax-content-inner">
                            <h3>{{$homesetting->paralax_title}}</h3>
                            <div class="paralax-description">
                                {!!$homesetting->about_description!!}
                                <div class="paralax-link-div"><a class="btn btn-style1" href="{{$homesetting->paralax_button_link}}">{{$homesetting->paralax_button_text}} </a></div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        @endif
    </div>



     <div class="portfolio-section">
        <div class="container">
            
            @if($homesetting->projects_subtitle)
            <h4><span>{{$homesetting->projects_subtitle}}</span></h4>
            @endif
            <h3>{!!$homesetting->projects_title!!}</h3>
           


            <div class="portfolio-slider owl-carousel">
                
                @foreach($projects as $key=>$project)
                    
                    <div class="portfolio-slider-inner">
                
                            <div class="project-box-div"> 
                                @php $count = $key + 1 @endphp
                                <a href="{{URL::to('/')}}/project/{{$project->slug}}" title="{{$project->title}}">
                                       <img class="img-fluid project-image lazy" width="400" height="400" src="/public/img/loading-blog.gif " data-src="{{$project->photo ? '/public/images/media/' . $project->photo->file : '/public/img/200x200.png'}}" alt="{{$project->title}}">
                                </a>
                                <div class="project-meta">

                                    <div class="project-meta-title">
                                        <a href="{{URL::to('/')}}/project/{{$project->slug}}" title="{{$project->title}}"><span class="project__text">{{$project->title}}</span></a>
                                    </div>

                                    <div class="project-category">
                                        <span class="block_text">{{$project->project_category->name}} </span>
                                    </div>

                                    <div class="projectreadmore">
                                        <a href="{{URL::to('/')}}/project/{{$project->slug}}" title="{{$project->title}}"><i class="icon-plus-custom"></i></a>
                                    </div>
                                    
                                </div>
                            </div>
                       
                    </div>

                    @if ($key == 3)
                        @break
                    @endif


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

    <div class="blog-section">

        <div class="container">

            <h3 class="blog-section-subtitle"><span>{!!$homesetting->blog_subtitle!!}</span></h3>
            <h3 class="blog-section-title">{!!$homesetting->blog_title!!}</h3>

            <div class="row">

                @foreach($posts as $post)
                <div class="col-md-4">
                    <article class="blog-single-post">

                        <div class="after-bg">
                           <a href="{{URL::to('/')}}/post/{{$post->slug}}" title="{{$post->title}}">
                                <div class="featured_image_blog">
                                    <img class="lazy blog_post_image img-fluid" width="370" height="380" src="/public/img/loading-blog.gif" data-src="{{$post->photo ? '/public/images/media/' . $post->photo->file : '/public/img/200x200.png'}}" alt="{{$post->title}}">
                                    <div class="flex-icon">
                                        <div class="flex-icon-inside">
                                            <i class="fas fa-link"></i>
                                        </div>
                                    </div>
                                </div>

                            </a>
                           <div class="entry-meta">
                                <div class="entry-date"><span>{{ date('d', strtotime($post->created_at)) }}</span><span>{{ date('M.y', strtotime($post->created_at)) }}</span></div>
                            </div>
                        </div>
                        <div class="blog-item">
                           <div class="box-content p-relative">
                              <div class="box-content-body">
                                
                                <div class="post-category-comment-date">
                                   <span class="post-tags"><i class="fa fa-tag"></i>{{$post->category->name}}</span>
                                </div>
                                <h2 class="title-block">
                                    <a href="{{URL::to('/')}}/post/{{$post->slug}}" title="{{$post->title}}">{{$post->title}}</a>
                                 </h2>
                                 <p class="desc-block"> {{$post->meta_description}} </p>
                              </div>
                           </div>
                        </div>

                    </article>
                </div>
                @endforeach

                
            </div>






        </div>

    </div>



@endsection

