<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    @php $setting = App\Models\Setting::find($currentLang->id); @endphp
    <!-- Page Title -->
    <title>@yield('title')</title>

    <!-- Meta Data -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="@yield('meta')">
    <link rel="canonical" href="{{url()->current()}}">
    <meta name="keywords" content="{{$setting->keywords}}" />
    <meta name="publisher" content="{{url()->current()}}">
    <meta name="copyright" content="Copyright (c) {{$setting->title}}" />
    <meta name="author" content="{{$setting->author}}" />
    <meta name="contact" content="{{$setting->contact}}" />

    <meta name="revisit-after" content="7 Days" />
    <meta name="robots" content="index, follow" />
    <meta name="googlebot" content="index, follow" />
    <meta name="subjects" content="{{$setting->title}}" />
    <meta name="classification" content="{{$setting->title}}" />

    <meta itemprop="name" content="@yield('title')">
    <meta itemprop="description" content="@yield('meta')">
    <meta itemprop="image" content="{{route('home')}}{{$setting->photo ? '/public/images/media/' . $setting->photo->file : '/public/img/200x200.png'}}">
    
    @if($setting->OGgraph_switch == 1)

    <meta property="og:title" content="@yield('title')" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{route('home')}}" />
    <meta property="og:image" content="{{route('home')}}{{$setting->photo ? '/public/images/media/' . $setting->photo->file : '/public/img/200x200.png'}}" />
    <meta property="og:site_name" content="{{$setting->author}}" />
    <meta property="og:description" content="@yield('meta')" />
    
    @endif

    @if($setting->analytics_switch == 1)

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{$setting->analytics}}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', '{{$setting->analytics}}');
    </script>
    
    @endif

    @if($setting->facebook_pixel_switch == 1)

    <!-- Facebook Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '{{$setting->facebook_pixel}}');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id={{$setting->facebook_pixel}}&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Facebook Pixel Code -->
    
    @endif
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{$setting->favicon}}" type="image/x-icon">
    <link rel="icon" href="{{$setting->favicon}}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">

    
   <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    @if($currentLang->rtl == 1) 
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;900&display=swap" rel="stylesheet">
    @else 
        <link href="{{$setting->font}}" rel="stylesheet">
    @endif
    
    <!-- Styles -->
    <link href="{{ asset('css/front/bootstrap.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('css/libs/fontawesome.min.css')}}" type="text/css" rel="stylesheet">
    <link href="{{ asset('css/front/owl.carousel.min.css')}}" type="text/css" rel="stylesheet">
    <link href="{{ asset('css/front/vex.css') }}" type="text/css" rel="stylesheet">
  

    @yield('styles')

    @if($currentLang->rtl == 1) 
        <link href="{{ asset('css/front/rtl.css') }}" type="text/css" rel="stylesheet">
    @endif

 <!-- Inline Styles -->  <!-- dynamic style -->
    <style>
      

        @if($setting->custom_css)
            {!! $setting->custom_css !!}
        @endif



    </style>

 

</head>
<body  class="common-front @if($currentLang->rtl == 1) rtl @endif" @if($currentLang->rtl == 1) dir="rtl" @endif>

    @if(Auth::check())

    @else
        @if($setting->maintenance_status == 1) 
            <div class="maintenance_cls"><div class="maintenance_inner">{!!$setting->maintenance_text!!}</div></div>
        @endif
    @endif
    

    

    @if($setting->maintenance_status == 0 || Auth::check()) 

    <header class="header">

        

        <div class="header__content__venor">

            <div class="side_panel_sidebar_parent">
                <div class="side_panel_sidebar">
                    <span class="side_panel_toggle"><span></span><span></span><span></span></span>
                </div> 
            </div>

            <div class="header__logo">
                <a href="{{url('/')}}" title="{{$setting->title}}">
                    <img width="105" height="22" class="img-fluid logo-front" src="{{$setting->photo ? '/public/images/media/' . $setting->photo->file : '/public/img/200x200.png'}}" alt="logo">
                </a>
            </div>


            <div class="header__menu__venor">


                <ul class="header__nav">

                    @foreach( $menus->sortBy('order') as $prod )
                       
                        @if($prod->on_off_submenu == 1)
                           <li class="header__nav-item dropdown">
                                <a class="header__nav-link dropdown-toggle" href="{{$prod->link}}"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$prod->name}}
                                </a>
                                {!! $prod->submenu !!}
                               
                            </li>
                        @else 
                             <li class="header__nav-item"> <a title="{{$prod->name}}" class="header__nav-link" href="{{$prod->link}}">{{$prod->name}}</a> </li>
                        @endif
                    @endforeach

                </ul>
            </div>

            <div class="header__actions__venor">
                
      

                <div class="header__lang">

                    @if (!empty($currentLang) && count($langs) > 1)
   

                        <a class="header__lang-btn" href="#" role="button" id="dropdownLang" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img width="16" height="16" src="{{$currentLang->photo ? '/public/images/media/' . $currentLang->photo->file : '/public/img/200x200.png'}}" alt="flag">
                            <span>{{$currentLang->name}}</span>
                        </a>

         
                        <ul class="dropdown-menu header__lang-dropdown" aria-labelledby="dropdownLang">
                            @foreach ($langs as $key => $lang)
                            <li><a title="{{$lang->name}}"  href='{{ route('changeLanguage', $lang->code) }}'><img width="16" height="16" src="{{$lang->photo ? '/public/images/media/' . $lang->photo->file : '/public/img/200x200.png'}}" alt="flag"><span>{{$lang->name}}</span></a></li>
                            @endforeach
                        </ul>
                    @endif

                </div>

                <div class="header__action header__action--signin">
                    <a class="header__action-btn header__action-btn--start-project" href="{{$headerfooter->sidebar_description}}">
                        <span>{{$headerfooter->sidebar_title}}</span>
                    </a>
                </div>
            </div>

            <button class="header__btn__venor" type="button">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </header>

    <div class="fixed-sidebar-menu-overlay" style="opacity: 0;"></div>

    <div class="fixed-sidebar-menu-holder header7">
        <div class="fixed-sidebar-menu">
            <div class="close-sidebar"></div>
            <div class="header7 sidebar-content">
                <div class="left-side">
                    <aside class="widget_sweetthemes_address_social_icons">
                        <div class="address-social-links">
                            <h5 class="widget-title">{{$headerfooter->sidebar_title2}}</h5>
                            <div class="contact-details">
                                {!! $headerfooter->sidebar_description2 !!}
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>



    @yield('content')

    <div class="typed-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>{{$headerfooter->typed_subtitle}}</h2>
                    <h3>{{$headerfooter->typed_titlebig}}</h3>
                </div>
                <div class="col-md-6 text-left">
                     <h4 class="parent-typed-text">
                        <span class="mt_typed-beforetext">{{$headerfooter->typed_title}} </span>
                        <span class="mt_typed_text"></span>
                        <span class="typed-desc">{{$headerfooter->typed_desc}}</span>
                    </h4>
                    <a href="{{$headerfooter->typed_buttonlink}}" target="_self" class="btn btn-style1"><span>{{$headerfooter->typed_buttontext}}</span></a>
                </div>
        
            </div>
        </div>
    </div>   


    <footer class="footer-section">
        <div class="footer-wrapper container">
            <div class="row">
                <div class="col-md-3">
                    <h4 class="title">{{$headerfooter->footer_col1_subtitle}}</h4>
                    @if($headerfooter->footer_col1_subtitle)
                    <span class="venor-animate-border"></span>
                    @endif
                    {!!$headerfooter->footer_col1_buttontext!!}
                </div>

                <div class="col-md-3">
                    <div class="footer-widget">
                        <div class="footer-widget widget_nav_menu">
                            <h4 class="title">{{$headerfooter->footer_col1_title}}</h4>
                            @if($headerfooter->footer_col1_title)
                            <span class="venor-animate-border"></span>
                            @endif
                            <div class="menu-quick-link-container">
                                {!!$headerfooter->footer_col1_buttonlink!!}
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="footer-widget">
                        <div class="footer-widget widget_nav_menu">
                            <h4 class="title">{{$headerfooter->footer_col2_title1}}</h4>
                            @if($headerfooter->footer_col2_title1)
                            <span class="venor-animate-border"></span>
                            @endif
                            <div class="menu-quick-link-container">
                                {!!$headerfooter->footer_col2_html1!!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-widget">
                        <div class="widget widget_custom_html">
                            <h4 class="title">{{$headerfooter->footer_col2_title2}}</h4>
                            @if($headerfooter->footer_col2_title2)
                            <span class="venor-animate-border"></span>
                            @endif
                            <div class="custom-html-widget">
                                {!!$headerfooter->footer_col2_html2!!}
                            </div>
                        </div>
                    </div>
                </div>
             
         
            </div>
        </div>
        <div class="container-copyright">
            <div class="container">
                <div class="copyright-text">
                    {!!$headerfooter->footer_copyright!!}
                    
                </div>
            </div>
        </div>
    </footer>


    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
        </svg>
    </div>
  




    @if($setting->SchmeaORG_switch == 1)

    <div class="hidden"  itemscope="" itemtype="https://schema.org/LocalBusiness">
        <span itemprop="description">@yield('meta')</span> 
        <a itemprop="url" href="{{route('home')}}"> </a>
        <div itemprop="image" itemscope itemtype="http://schema.org/ImageObject">
        <img src="{{route('home')}}{{$setting->photo ? '/public/images/media/' . $setting->photo->file : '/public/img/200x200.png'}}" alt="logo" width="120" itemprop="url"></div>
        <span itemprop="name">{{$setting->title}}</span>
        <em><span itemprop="priceRange">{{$setting->price_range}}</span></em>
        <div itemprop="address" itemscope="" itemtype="https://schema.org/PostalAddress"> 
            <span itemprop="addressLocality">{{$setting->address}}</span> | 
            <span itemprop="addressCountry">{{$setting->country}}</span> | 
            <span itemprop="telephone">{{$setting->phone}}</span> | 
            <span itemprop="email">{{$setting->contact}}</span>
        </div>
    </div> 

    @endif


    @if($setting->whatsapp == 1)
    <a target="_blank" class="codeless-add-purchase-button" href="https://wa.me/{{$setting->phone}}"><i class="icon"><svg height="30px" viewBox="-23 -21 682 682.66669" width="30px" xmlns="http://www.w3.org/2000/svg"><path d="m544.386719 93.007812c-59.875-59.945312-139.503907-92.9726558-224.335938-93.007812-174.804687 0-317.070312 142.261719-317.140625 317.113281-.023437 55.894531 14.578125 110.457031 42.332032 158.550781l-44.992188 164.335938 168.121094-44.101562c46.324218 25.269531 98.476562 38.585937 151.550781 38.601562h.132813c174.785156 0 317.066406-142.273438 317.132812-317.132812.035156-84.742188-32.921875-164.417969-92.800781-224.359376zm-224.335938 487.933594h-.109375c-47.296875-.019531-93.683594-12.730468-134.160156-36.742187l-9.621094-5.714844-99.765625 26.171875 26.628907-97.269531-6.269532-9.972657c-26.386718-41.96875-40.320312-90.476562-40.296875-140.28125.054688-145.332031 118.304688-263.570312 263.699219-263.570312 70.40625.023438 136.589844 27.476562 186.355469 77.300781s77.15625 116.050781 77.132812 186.484375c-.0625 145.34375-118.304687 263.59375-263.59375 263.59375zm144.585938-197.417968c-7.921875-3.96875-46.882813-23.132813-54.148438-25.78125-7.257812-2.644532-12.546875-3.960938-17.824219 3.96875-5.285156 7.929687-20.46875 25.78125-25.09375 31.066406-4.625 5.289062-9.242187 5.953125-17.167968 1.984375-7.925782-3.964844-33.457032-12.335938-63.726563-39.332031-23.554687-21.011719-39.457031-46.960938-44.082031-54.890626-4.617188-7.9375-.039062-11.8125 3.476562-16.171874 8.578126-10.652344 17.167969-21.820313 19.808594-27.105469 2.644532-5.289063 1.320313-9.917969-.664062-13.882813-1.976563-3.964844-17.824219-42.96875-24.425782-58.839844-6.4375-15.445312-12.964843-13.359374-17.832031-13.601562-4.617187-.230469-9.902343-.277344-15.1875-.277344-5.28125 0-13.867187 1.980469-21.132812 9.917969-7.261719 7.933594-27.730469 27.101563-27.730469 66.105469s28.394531 76.683594 32.355469 81.972656c3.960937 5.289062 55.878906 85.328125 135.367187 119.648438 18.90625 8.171874 33.664063 13.042968 45.175782 16.695312 18.984374 6.03125 36.253906 5.179688 49.910156 3.140625 15.226562-2.277344 46.878906-19.171875 53.488281-37.679687 6.601563-18.511719 6.601563-34.375 4.617187-37.683594-1.976562-3.304688-7.261718-5.285156-15.183593-9.253906zm0 0" fill-rule="evenodd"/></svg></i></a>
    @endif

    <script src="{{ asset('js/libs/jquery.min.js') }}"></script>
    <script src="{{ asset('js/front/popper.min.js') }}"></script>
    <script src="{{ asset('js/front/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('js/front/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/front/simpleParallax.min.js') }}" defer></script>
    <script src="{{ asset('js/front/countTO.js') }}" defer></script>
    <script src="{{ asset('js/front/typed.min.js') }}" defer></script>
    <script src="{{ asset('js/front/shuffleLetters.js') }} " defer></script>
    <script src="{{ asset('js/front/tilt.jquery.min.js') }} " defer></script>
    <script src="{{ asset('js/front/magnific.min.js') }}" defer></script>

    <script src="{{ asset('js/front/vex.js') }}" defer></script>


    <svg width="0" height="0" display="none" xmlns="http://www.w3.org/2000/svg">
    <symbol id="arrow" xmlns="http://www.w3.org/2000/svg" width="11.4" height="9.2"><path d="M11.3 4.1L8.1.2c-.3-.2-.7-.3-1 0-.3.2-.3.6-.1.9l2.3 2.8H.7c-.4 0-.7.3-.7.7 0 .4.3.7.7.7h8.6L7 8c-.2.3-.2.8.1 1 .3.2.7.2 1-.1L11.3 5c.2-.3.2-.6 0-.9z"/></symbol>
    <symbol id="scroll" xmlns="http://www.w3.org/2000/svg" width="15" height="22.1"><path class="st0" d="M7.5 16.5c.6 0 1.1.5 1.1 1.1 0 .6-.5 1.1-1.1 1.1-.6 0-1.1-.5-1.1-1.1 0-.6.5-1.1 1.1-1.1zM7.5 9.8c.6 0 1.1.5 1.1 1.1 0 .6-.5 1.1-1.1 1.1-.6 0-1.1-.5-1.1-1.1 0-.6.5-1.1 1.1-1.1zM7.5 6.5c.6 0 1.1.5 1.1 1.1 0 .6-.5 1.1-1.1 1.1-.6 0-1.1-.5-1.1-1.1 0-.6.5-1.1 1.1-1.1zM7.5 3.2c.6 0 1.1.5 1.1 1.1 0 .6-.5 1.1-1.1 1.1-.6 0-1.1-.5-1.1-1.1 0-.6.5-1.1 1.1-1.1zM7.5 0c.6 0 1.1.5 1.1 1.1 0 .6-.5 1.1-1.1 1.1-.6 0-1.1-.5-1.1-1.1C6.4.5 6.9 0 7.5 0zM7.5 19.8c.6 0 1.1.5 1.1 1.1 0 .6-.5 1.1-1.1 1.1-.6 0-1.1-.5-1.1-1.1 0-.6.5-1.1 1.1-1.1zM4.2 16.5c.6 0 1.1.5 1.1 1.1 0 .6-.5 1.1-1.1 1.1-.6 0-1.1-.5-1.1-1.1 0-.6.5-1.1 1.1-1.1zM10.6 16.5c.6 0 1.1.5 1.1 1.1 0 .6-.5 1.1-1.1 1.1-.6 0-1.1-.5-1.1-1.1 0-.6.5-1.1 1.1-1.1zM7.5 13.2c.6 0 1.1.5 1.1 1.1 0 .6-.5 1.1-1.1 1.1-.6 0-1.1-.5-1.1-1.1 0-.6.5-1.1 1.1-1.1zM1.9 13.5c.4.4.4 1.2 0 1.6-.4.4-1.2.4-1.6 0-.4-.4-.4-1.2 0-1.6.5-.4 1.2-.4 1.6 0M4.3 13.2c.6 0 1.1.5 1.1 1.1 0 .6-.5 1.1-1.1 1.1-.6 0-1.1-.5-1.1-1.1 0-.6.5-1.1 1.1-1.1zM14.7 13.5c.4.4.4 1.2 0 1.6-.4.4-1.2.4-1.6 0-.4-.4-.4-1.2 0-1.6.4-.4 1.1-.4 1.6 0M10.7 13.2c.6 0 1.1.5 1.1 1.1 0 .6-.5 1.1-1.1 1.1-.6 0-1.1-.5-1.1-1.1 0-.6.5-1.1 1.1-1.1z"/></symbol>
    <symbol id="share" xmlns="http://www.w3.org/2000/svg" width="18" height="20.2"><path d="M14.3 18.5c-1.1 0-1.9-.9-1.9-1.9 0-1.1.9-1.9 1.9-1.9 1.1 0 1.9.9 1.9 1.9.1 1-.8 1.9-1.9 1.9zM3.5 12.3c-1.1 0-1.9-.9-1.9-1.9 0-1.1.9-1.9 1.9-1.9 1.1 0 1.9.9 1.9 1.9.1 1.1-.8 1.9-1.9 1.9zM14.3 1.7c1.1 0 1.9.9 1.9 1.9 0 1.1-.9 1.9-1.9 1.9-1.1 0-1.9-.9-1.9-1.9 0-1.1.8-1.9 1.9-1.9zm0 11.2c-1.2 0-2.2.6-2.9 1.5l-4.5-2.6c.2-.4.3-.9.3-1.4 0-.7-.2-1.3-.5-1.9L11.6 6c.7.8 1.7 1.3 2.7 1.3 2 0 3.6-1.7 3.6-3.6 0-2-1.7-3.6-3.6-3.6-2 0-3.6 1.7-3.6 3.6 0 .3 0 .6.1.9L5.4 7.3c-.5-.3-1.1-.5-1.8-.5-2 0-3.6 1.7-3.6 3.6 0 2 1.7 3.6 3.6 3.6.9 0 1.7-.3 2.3-.8l4.8 2.7v.6c0 2 1.7 3.6 3.6 3.6 2 0 3.6-1.7 3.6-3.6.1-1.9-1.6-3.6-3.6-3.6z"/></symbol>

    </svg>

    @include('cookieConsent::index')

  



    @yield('scripts')

    <script type="text/javascript">
    ( function ( $ ) {
        'use strict';
        $( document ).ready( function () {
            /* TYPED TEXT */
            $(function(){
                $(".mt_typed_text").typed({
                  strings: {!! $headerfooter->typed_text !!}, //blade / php dynamic functionality
                  typeSpeed: 1,
                  backDelay: 4000,
                  loop: true
                });
            });
        })
    } ( jQuery ) )
    </script>

    @if($setting->custom_css)
        <script type="text/javascript">
            {!! $setting->custom_js !!} //blade / php dynamic functionality
        </script>
    @endif


    @endif

</body>
</html>
